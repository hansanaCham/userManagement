<?php

namespace App\Http\Controllers;

use App\Attendance;
use Illuminate\Http\Request;
use App\Repositories\AttendanceRepository;

class AttendanceController extends Controller
{

    private $attendanceRepository;
    public function __construct(AttendanceRepository $attendanceRepository)
    {
        $this->attendanceRepository = $attendanceRepository;
        $this->middleware(['auth:api']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->attendanceRepository->all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        if ($this->attendanceRepository->save($request)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return   $this->attendanceRepository->find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function edit(Attendance $attendance)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        request()->validate([
            'ac_no' => 'sometimes|required|integer',
            'name' => 'sometimes|required|string',
            'date' => 'sometimes|required|date',
            'timetable' => 'sometimes|required|string',
            'on_duty' => 'sometimes|required|date_format:H:i',
            'off_duty' => 'sometimes|required|date_format:H:i',
            'clock_in' => 'nullable|date_format:H:i',
            'clock_out' => 'nullable|date_format:H:i',
            'late' => 'nullable|date_format:H:i',
            'early' => 'nullable|date_format:H:i',
            'absent' => 'sometimes|required|integer|between:0,1',
            'ot_time' => 'nullable|date_format:H:i',
            'work_time' => 'nullable|date_format:H:i',
        ]);
        if ($this->attendanceRepository->update($request, $id)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 1, "message" => "fail"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Attendance  $attendance
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if ($this->attendanceRepository->delete($id)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 1, "message" => "fail"));
        }
    }

    public function getByAttribute($attribute, $value)
    {
        return  $this->attendanceRepository->getByAttribute($attribute, $value);
    }
}
