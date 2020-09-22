<?php

namespace App\Http\Controllers;

use App\LeaveConfig;
use Illuminate\Http\Request;
use App\Repositories\LeaveConfigRepository;

class LeaveConfigController extends Controller
{
    private $leaveConfigRepository;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->leaveConfigRepository->all();
    }
    public function __construct(LeaveConfigRepository $leaveConfigRepository)
    {
        $this->leaveConfigRepository = $leaveConfigRepository;
        $this->middleware(['auth:api']);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }
    public function test()
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
        request()->validate([
            'leave_type' => 'required|string|unique:leave_configs',
            'no_of_days' => 'required|integer',
        ]);
        if ($this->leaveConfigRepository->save($request)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveConfig  $leaveConfig
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveConfig $leaveConfig)
    {
        return $leaveConfig;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveConfig  $leaveConfig
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveConfig $leaveConfig)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveConfig  $leaveConfig
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveConfig $leaveConfig)
    {
        // dd();
        request()->validate([
            'leave_type' =>
            'sometimes|required|string|unique:leave_configs,leave_type,' . $leaveConfig->id,
            'no_of_days' => 'sometimes|required|integer',
        ]);
        if ($this->leaveConfigRepository->update($leaveConfig, $request)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveConfig  $leaveConfig
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveConfig $leaveConfig)
    {
        if ($this->leaveConfigRepository->delete($leaveConfig)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    public function getByAttribute($attribute, $value)
    {
        return  $this->leaveConfigRepository->getByAttribute($attribute, $value);
    }
}
