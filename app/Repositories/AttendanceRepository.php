<?php

namespace App\Repositories;

use App\Models\Attendance;
use PhpParser\Node\Expr\FuncCall;

class AttendanceRepository
{
    public function __construct(
        protected Attendance $attendanceModel
    ) {
        $this->attendanceModel = $attendanceModel;
    }

    public function clockIn($userId, $date, $clockIn)
    {
        return $this->attendanceModel->create([
            'user_id' => $userId,
            'date' => $date,
            'clock_in' => $clockIn
        ]);
    }

    public function clockOut($userId, $date, $clockOut)
    {
        return $this->attendanceModel
            ->where('user_id', $userId)
            ->whereDate('date', $date)
            ->update([
                'clock_out' => $clockOut,
                'updated_at' => now()
            ]);
    }

    public function validateClockIn($date, $clockIn, $userId)
    {
        return $this->attendanceModel
            ->whereDate('date', $date)
            ->whereTime('clock_in', $clockIn)
            ->where('user_id', $userId)
            ->exists();
    }


    // public function index()
    // {
    //     return $this->attendanceModel->get();
    // }

    public function list()
    {
        return $this->attendanceModel->get();
    }

    public function getSpecificAttendanceDate($date)
    {
        return $this->attendanceModel
            ->whereDate('date', $date)
            ->first();
    }
}
