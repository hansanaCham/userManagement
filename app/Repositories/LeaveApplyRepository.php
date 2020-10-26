<?php

namespace App\Repositories;

use App\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImportRepositories;
use App\LeaveApply;

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of SurveyRepository
 *
 * @author hansana
 */
class LeaveApplyRepository
{
    public function save($request)
    {
        return LeaveApply::create($request);
    }

    public function update($leaveApply, $request)
    {
        return $leaveApply->update($request);
    }
    public function all()
    {
        return LeaveApply::all();
    }
    public function delete($leaveConfig)
    {
        return $leaveConfig->delete();
    }
    public function getByAttribute($attribute, $value)
    {
        return LeaveApply::where($attribute, $value)->get();
    }
}
