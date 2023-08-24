<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Event;
class EventController extends Controller
{
    public function index(Event $event)//インポートしたEVENTtをインスタンス化して$eventとして使用。
    {
        return $event->get();//$eventの中身を戻り値にする。
    }
}
