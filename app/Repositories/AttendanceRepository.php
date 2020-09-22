<?php

namespace App\Repositories;

use App\Attendance;
use App\Imports\AttendecesImport;
use Maatwebsite\Excel\Facades\Excel;


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
class AttendanceRepository
{
    public function save($request)
    {

        Excel::import(new AttendecesImport, $request->file('file'));
    }

    public function update($leaveConfig, $request)
    {
        // return LeaveConfig::create($request->all());
        // return $leaveConfig->update($request->all());
    }
    public function all()
    {
        // return LeaveConfig::all();
    }
    public function delete($leaveConfig)
    {
        // return $leaveConfig->delete();
    }
    public function getByAttribute($attribute, $value)
    {
        // return LeaveConfig::where($attribute, $value)->get();
    }
}
