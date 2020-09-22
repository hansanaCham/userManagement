<?php

use Illuminate\Http\Request;

// Route::get('/leave_groups/{attribute}/{value}', 'LeaveGroupController@getByAttribute');
Route::apiResource('/attendance', 'AttendanceController');  // create a new user
/**
 * data set
 * {
    "leave_type": "medical89",
    "no_of_days": "5"
    }
 */
