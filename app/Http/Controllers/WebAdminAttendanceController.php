<?php

namespace App\Http\Controllers;

use App\Models\Attendance;
use Illuminate\Http\Client\Request;

class WebAdminAttendanceController extends Controller
{

    public function __construct(
        protected Attendance $attendance
    ) {
        $this->attendance = $attendance;
    }

    public function getAllAttendances()
    {
        $attendances = $this->attendance->orderBy('date', 'asc')->get();

        return view('admin.UserAttendanceList', compact('attendances'));
    }

    public function getAttendanceByDate(Request $request)
    {
        $date = $request->input('date');

        $attendances = $this->attendance->whereDate('clock_in', $date)->orWhere('clock_out', $date)->get();

        return view('admin.UserAttendanceList', ['attendances' => $attendances]);
    }
}
