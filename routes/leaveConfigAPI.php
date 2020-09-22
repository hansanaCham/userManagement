<?php

use Illuminate\Http\Request;

Route::get('/leave_configs/{attribute}/{value}', 'LeaveConfigController@getByAttribute'); // get data by attribute name and attribute value

Route::apiResource('/leave_configs', 'LeaveConfigController');  // create a new user
/**
 * data set
 * {
    "leave_type": "medical89",
    "no_of_days": "5"
    }
 */
