<?php

namespace App\Http\Controllers;

use App\Models\Attendance;

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
}
