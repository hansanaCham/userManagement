<?php

namespace App\Repositories;

use App\Tire;

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
class TireRepository
{
    public function save($request)
    {
    }

    public function update($request, $id)
    {
        // return Attendance::findOrFail($id)->update($request) == true;
    }
    public function all()
    {
        return Tire::all();
    }

    public function find($id)
    {
        // return Attendance::findOrFail($id);
    }
    public function delete($id)
    {
        // return Attendance::findOrFail($id)->delete() == true;
    }
    public function getByAttribute($attribute, $value)
    {
        // return Attendance::where($attribute, $value)->get();
    }
    public function getAttendanceFromT0($empId, $from, $to)
    {
        // return Attendance::where('employee_no', $empId)->whereBetween('date', [$from, $to])->get();
    }
}
