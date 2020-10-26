<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\LeaveApply;
use Illuminate\Http\Request;
use App\Repositories\LeaveApplyRepository;

class LeaveApplyController extends Controller
{
    private $leaveApplyRepository;

    public function __construct(LeaveApplyRepository $leaveApplyRepository)
    {
        $this->leaveApplyRepository = $leaveApplyRepository;
        $this->middleware(['auth:api']);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd("das");
        return  $this->leaveApplyRepository->all();
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
        request()->validate([
            'leave_config_id' =>  'required|integer',
            'from_date' => 'required|date',
            'to_date' => 'required|date',
            'user_id' => 'required|integer',
            'comment' => 'nullable|string',
            'file' => 'sometimes|required|mimes:jpeg,jpg,png,pdf'
        ]);
        $requestData = $request->all();
        if ($request->file('file') != null) {
            $file_name = Carbon::now()->timestamp . '.' . $request->file->extension();
            $fileUrl = '/uploads/' . FieUploadController::getLeavePath($request->user_id);
            $storePath = 'public' . $fileUrl;
            $path = $request->file('file')->storeAs($storePath, $file_name);
            $requestData['attachment'] = "storage" . $fileUrl . "/" . $file_name;
        }
        // dd($requestData);
        if ($this->leaveApplyRepository->save($requestData)) {

            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\LeaveApply  $leaveApply
     * @return \Illuminate\Http\Response
     */
    public function show(LeaveApply $leaveApply)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\LeaveApply  $leaveApply
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveApply $leaveApply)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\LeaveApply  $leaveApply
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveApply $leaveApply, Request $request)
    {
        request()->validate([
            'leave_config_id' =>  'sometimes|required|integer',
            'from_date' => 'sometimes|required|date',
            'to_date' => 'sometimes|required|date',
            'user_id' => 'sometimes|required|integer',
            'comment' => 'nullable|string',
            'file' => 'sometimes|required|mimes:jpeg,jpg,png,pdf'
        ]);
        // dd($request->all());
        $requestData = $request->all();
        if ($request->file('file') != null) {
            $file_name = Carbon::now()->timestamp . '.' . $request->file->extension();
            $fileUrl = '/uploads/' . FieUploadController::getLeavePath($request->user_id);
            $storePath = 'public' . $fileUrl;
            $path = $request->file('file')->storeAs($storePath, $file_name);
            $requestData['attachment'] = "storage" . $fileUrl . "/" . $file_name;
        }
        // dd($requestData);
        if ($this->leaveApplyRepository->update($leaveApply, $requestData)) {

            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\LeaveApply  $leaveApply
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveApply $leaveApply)
    {
        if ($this->leaveApplyRepository->delete($leaveApply)) {
            return response(array("id" => 1, "message" => "ok"));
        } else {
            return response(array("id" => 0, "message" => "fail"));
        }
    }
}
