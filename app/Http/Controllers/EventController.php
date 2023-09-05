<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
use App\Models\Friend;
use App\Models\SharedEvent;
use App\Http\Requests\EventRequest; 
class EventController extends Controller
{
    public function index(Event $event)//インポートしたEVENTをインスタンス化して$eventとして使用。
    {
        $events=Event::where('user_id',auth()->id())->paginate(4);
        return view('events.index',compact('events'));
    }
    
    public function show(Event $event){
        return view('events.show')->with([
            'event' => $event
            ]);
    }
    
    public function create(){
        $templates = Event::withTrashed()->where('is_template', 1)->get();
        if($templates != NULL){
            return view('events.create',compact('templates'));
        }else{
            return view('events.create');
        }
    }
    
    public function share(User $user,Event $event){
        $userId = Auth::id();
        $followeesId=Friend::where('followee_id',$userId)->pluck('follower_id')->toArray();
        $receivers = User::whereIn('id',$followeesId)->get();
        return view('events.share',compact('receivers','event'));
    }
    
    public function store(EventRequest $request, Event $event){
        $input = $request['event'];
        $input['user_id'] = Auth::id();
        $event->fill($input)->save(); // 取得したデータでモデルを更新
        return redirect('/events/' . $event->id);
    }
    
    public function edit(Event $event){
        return view('events.edit')->with(['event' => $event]);
    }
    
    public function update(Event $event,EventRequest $request){
        $input_event = $request['event'];
        $event->fill($input_event)->save();
        
        return redirect('/events/' . $event->id);
    }
    
    public function templateUpdate(Request $request, Event $event) {
        // 選択されたテンプレートのIDを受け取る
        $selectedTemplateId = $request->input('template');
        if($selectedTemplateId != NULL){
            // 選択されたテンプレートのデータのidを取得
            $selectedTemplate = Event::where('id',$selectedTemplateId)->first();
            // 予定データを取得
            
            // テンプレートのデータで予定データを上書き
            $event->title = $selectedTemplate->title;
            $event->start_time = $selectedTemplate->start_time;
            $event->end_time = $selectedTemplate->end_time;
            $event->location = $selectedTemplate->location;
            $event->description = $selectedTemplate->description;
            $event->send_at = $selectedTemplate->send_at;
            $event->is_release = $selectedTemplate->is_release;
            $event->is_template = 0;
            // 他のフィールドも同様に上書き
    
            // フォームに上書きされたデータを表示するためにフォームに戻る
            return redirect('/events/create')->with('event',$event);
        }
        else{
            return redirect('/events/create');
        }
    }
    
    public function shareEvent(Request $request,Event $event,SharedEvent $sharedEvent){
        $userId = Auth::id();
        $sharedEvent -> event_id = $event->id;
        $sharedEvent -> sharing_user_id = $userId;
        $sharedEvent -> shared_user_id = $request->input('shareUser');
        $sharedEvent -> save();
        
        return redirect('/events');
    }
    
    public function delete(Event $event){
        $event->delete();
        return redirect('/events/');
    }
}
