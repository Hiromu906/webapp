<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Event;
use App\Models\User;
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
        return view('events.create');
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
    public function delete(Event $event){
        $event->delete();
        return redirect('/events/');
    }
}
