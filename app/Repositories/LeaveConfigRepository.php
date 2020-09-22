<?php

namespace App\Repositories;

use App\LeaveConfig;
use App\SurayParamAttribute;
use App\SurveyResult;

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
class LeaveConfigRepository
{
    public function save($request)
    {
        return LeaveConfig::create($request->all());
    }

    public function update($leaveConfig, $request)
    {
        // return LeaveConfig::create($request->all());
        return $leaveConfig->update($request->all());
    }
    public function all()
    {
        return LeaveConfig::all();
    }
    public function delete($leaveConfig)
    {
        return $leaveConfig->delete();
    }
    public function getByAttribute($attribute, $value)
    {
        return LeaveConfig::where($attribute, $value)->get();
    }
}
