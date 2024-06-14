<?php

namespace App\Services;

use App\Http\Requests\Attendance\ClockInAttendanceRequest;
use App\Http\Requests\Attendance\ClockOutAttendanceRequest;
use App\Http\Requests\Attendance\GetSpecificAttendanceDateRequest;
use App\Repositories\AttendanceRepository;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpKernel\Exception\HttpException;

class AttendanceService
{
    public function __construct(
        protected AttendanceRepository $attendanceRepository
    ) {
        $this->attendanceRepository = $attendanceRepository;
    }

    public function clockIn(ClockInAttendanceRequest $request)
    {
        $userId = Auth::id();
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $clockIn = Carbon::parse($request->clock_in)->format('H:i');

        $dateValidation = $this->attendanceRepository->validateClockIn($date, $clockIn, $userId);
        if ($dateValidation) throw new HttpException(422, 'You\'ve been clock in today!');

        return $this->attendanceRepository->clockIn($userId, $date, $clockIn);
    }

    public function clockOut(ClockOutAttendanceRequest $request)
    {
        $userId = Auth::id();
        $date = Carbon::parse($request->date)->format('Y-m-d');
        $clockOut = Carbon::parse($request->clock_out)->format('H:i');

        $dateValidation = $this->attendanceRepository->validateClockIn($date, $clockOut, $userId);
        if ($dateValidation) throw new HttpException(422, 'You must clock in first!');

        return $this->attendanceRepository->clockOut($userId, $date, $clockOut);
    }

    // public function index()
    // {
    //     return $this->attendanceRepository->index();
    // }

    public function list()
    {
        return $this->attendanceRepository->list();
    }

    public function getSpecificAttendanceDate(GetSpecificAttendanceDateRequest $request)
    {
        $requestDate = Carbon::parse($request->date)->format('Y-m-d');

        $date = $this->attendanceRepository->getSpecificAttendanceDate($requestDate);

        if (!$date) throw new HttpException(404, 'Not found!');

        return $date;
    }
}
