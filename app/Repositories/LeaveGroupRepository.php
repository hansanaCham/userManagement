<?php

namespace App\Repositories;

use App\LeaveConfig;
use App\LeaveGroup;

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
class LeaveGroupRepository
{
    public function save($request)
    {
        // dd()
        return   \DB::transaction(function () use ($request) {
            $leaveGroup  = LeaveGroup::create($request->all());
            return $leaveGroup->leaveConfigs()->sync($request->leave_types);
        });
    }

    public function update($leaveGroup, $request)
    {
        // return LeaveConfig::create($request->all());
        return   \DB::transaction(function () use ($leaveGroup, $request) {
            $leaveGrp = $leaveGroup->update($request->all());
            // dd($leaveGroup);
            return $leaveGroup->leaveConfigs()->sync($request->leave_types);
        });
    }
    public function all()
    {
        return LeaveGroup::all();
    }
    public function delete($leaveGroup)
    {
        return $leaveGroup->delete();
    }
    public function getByAttribute($attribute, $value)
    {
        return LeaveGroup::where($attribute, $value)->get();
    }
}
