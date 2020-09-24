<?php

use Illuminate\Http\Request;

Route::get('/attendance/{attribute}/{value}', 'AttendanceController@getByAttribute');
Route::apiResource('/attendance', 'AttendanceController');  // create a new user
/**
 * data set
 * {
    "leave_type": "medical89",
    "no_of_days": "5"
    }
 */
