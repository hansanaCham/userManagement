<?php

namespace App\Repositories;

use App\Attendance;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\AttendanceImportRepositories;


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

        Excel::import(new AttendanceImportRepositories, $request->file('file'));
        return true;
    }

    public function update($request, $id)
    {
        return Attendance::findOrFail($id)->update($request) == true;
    }
    public function all()
    {
        return Attendance::with('user')->get();
    }

    public function find($id)
    {
        return Attendance::findOrFail($id);
    }
    public function delete($id)
    {
        return Attendance::findOrFail($id)->delete() == true;
    }
    public function getByAttribute($attribute, $value)
    {
        return Attendance::with('user')->where($attribute, $value)->get();
    }
    public function getAttendanceFromT0($empId, $from, $to)
    {
        return Attendance::with('user')->where('employee_no', $empId)->whereBetween('date', [$from, $to])->get();
    }
}
