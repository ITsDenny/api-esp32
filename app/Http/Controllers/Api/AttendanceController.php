<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Attendance\ClockInAttendanceRequest;
use App\Http\Requests\Attendance\ClockOutAttendanceRequest;
use App\Http\Requests\Attendance\GetSpecificAttendanceDateRequest;
use App\Http\Resources\Attendance\getAllAttendanceResource;
use App\Http\Resources\Attendance\showSpecificDateResource;
use App\Services\AttendanceService;
use Illuminate\Http\Request;

class AttendanceController extends Controller
{
    public function __construct(
        protected AttendanceService $attendanceService
    ) {
        $this->attendanceService = $attendanceService;
    }

    public function clockIn(ClockInAttendanceRequest $request)
    {
        $clockIn = $this->attendanceService->clockIn($request);

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Clock In successfully'
            ],
            'data' => $clockIn

        ], 200);
    }

    public function clockOut(ClockOutAttendanceRequest $request)
    {
        $clockOut = $this->attendanceService->clockOut($request);

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Clock out successfully'
            ],
            'data' => $clockOut

        ], 200);
    }

    public function index()
    {
    }

    public function list()
    {
        $list = $this->attendanceService->list();

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Request Success'
            ],
            'data' => [
                collect(getAllAttendanceResource::collection($list))
            ]

        ], 200);
    }

    public function getSpecificAttendanceDate(GetSpecificAttendanceDateRequest $request)
    {
        $date = $this->attendanceService->getSpecificAttendanceDate($request);

        return response()->json([
            'meta' => [
                'success' => true,
                'code' => 200,
                'message' => 'Request Success'
            ],
            'data' => new showSpecificDateResource($date)

        ], 200);
    }
}
