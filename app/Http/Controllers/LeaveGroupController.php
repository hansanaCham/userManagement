<?php

namespace App\Http\Controllers;

use App\LeaveGroup;
use Illuminate\Http\Request;
use App\Repositories\LeaveGroupRepository;

class LeaveGroupController extends Controller
{
    private $leaveGroupRepository;

    public function __construct(LeaveGroupRepository $leaveConfigRepository)
    {
        $this->middleware(['auth:api']);
        $this->leaveGroupRepository = $leaveConfigRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return  $this->leaveGroupRepository->all();
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        request()->validate([
            'name' => 'required|string|unique:leave_groups',
        ]);
        if ($this->leaveGroupRepository->save($request)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveGroup  $leaveGroup
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveGroup $leaveGroup)
    {
        return $leaveGroup;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveGroup  $leaveGroup
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveGroup $leaveGroup)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveGroup  $leaveGroup
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, LeaveGroup $leaveGroup)
    {
        request()->validate([
            'name' => 'sometimes|required|string|unique:leave_groups,name,' . $leaveGroup->id,
        ]);
        if ($this->leaveGroupRepository->update($leaveGroup, $request)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveGroup  $leaveGroup
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveGroup $leaveGroup)
    {
        if ($this->leaveGroupRepository->delete($leaveGroup)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }
}
