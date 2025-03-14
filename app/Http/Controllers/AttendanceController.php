<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Attendance;
use App\Models\Event;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Auth;

class AttendanceController extends Controller
{
    public function recordAttendance(Request $request, Event $event)
    {
        $attendance = new Attendance();
        $attendance->event_id = $event->id;
        $attendance->user_id = Auth::id();
        $attendance->attendance_time = now();
        $attendance->save();

        return redirect()->back()->with('success', 'Attendance recorded successfully.');
    }

    public function showAttendance(Event $event)
    {
        $attendances = Attendance::where('event_id', $event->id)->get();
        return view('attendances.show', compact('event', 'attendances'));
    }

    public function index(){
        $attendances = Attendance::all();
        return view('attendances.index', compact('attendances'));
    }
}
