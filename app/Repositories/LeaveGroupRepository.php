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
        return LeaveGroup::create($request->all());
    }

    public function update($leaveGroup, $request)
    {
        // return LeaveConfig::create($request->all());
        return $leaveGroup->update($request->all());
    }
    public function all()
    {
        return LeaveGroup::all();
    }
    public function delete($leaveGroup)
    {
        return $leaveGroup->delete();
    }
}
