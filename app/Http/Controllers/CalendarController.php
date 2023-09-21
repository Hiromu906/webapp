<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Calendar\CalendarView;
use App\Models\Event;
use App\Models\User;

class CalendarController extends Controller
{
    public function show(){
		$calendar = new CalendarView(now());
		$events = $this->getEventsForMonth(); // 月の予定を取得
		return view('dashboard.calendar', [
        "calendar" => $calendar,
        "events" => $events, // 月の予定をビューに渡す
    ]);
	}
	public function showTodayEvents(){
	    $events = $this->getTodaysEvents(); // 今日の予定を取得

    return view('dashboard.todayEvents', [
        'events' => $events // 予定をビューに渡す
    ]);
	}
	public function getEvents()
    {
    	$userId = Auth()->user()->user_id;
        $events = Event::where('user_id',$userId)->get();

        return response()->json($events);
    }
    public function getTodaysEvents()
    {
    $today = now()->toDateString(); // 今日の日付を取得
    $events = Event::whereDate('start_time', $today)->orderBy('start_time')->get(); // 今日の予定を取得
    
    return $events;
    }
    public function getEventsForMonth()
{
    $startOfMonth = now()->startOfMonth();
    $endOfMonth = now()->endOfMonth();
    $userId = Auth()->user()->user_id;
    $events = Event::where('user_id', $userId)
        ->whereBetween('start_time', [$startOfMonth, $endOfMonth])
        ->get();
    return $events;
}
}
