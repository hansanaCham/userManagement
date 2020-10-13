<?php

use Illuminate\Http\Request;

Route::get('/attendance/employee_no/{employee_no}/from/{from}/to/{to}', 'AttendanceController@getAttendanceFromT0');
Route::get('/attendance/{attribute}/{value}', 'AttendanceController@getByAttribute');
Route::apiResource('/attendance', 'AttendanceController');  // create a new user
/**
 * data set
 * {
    "leave_type": "medical89",
    "no_of_days": "5"
    }
 */


Route::apiResource('/department', 'DepartmentController');  // department
/**
 * data set
 * {
        "id": 2,
        "name": "Dep 2",
        "created_at": null,
        "updated_at": null,
        "deleted_at": null
    },
 */
Route::apiResource('/tire', 'TireController');  // tire
