<?php

use Illuminate\Http\Request;

Route::apiResource('/leave_groups', 'LeaveGroupController');  // create a new user
/**
 * data set
 * {
    "leave_type": "medical89",
    "no_of_days": "5"
    }
 */
