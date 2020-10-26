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

Route::apiResource('/leave_apply', 'LeaveApplyController');  // create a leave apply get put post
/**
 * Data set
 *  "id": 8,
        "leave_config_id": 3,
        "from_date": "2020-01-01",
        "to_date": "2020-01-03",
        "user_id": 1,
        "comment": "dsadaasdasda",
        "attachment": "storage//uploads/attachements/1/leaves/1603730596.jpeg",
        "status": 0,
        "created_at": "2020-10-26 16:43:16",
        "updated_at": "2020-10-26 16:43:16",
        "deleted_at": null
 */
