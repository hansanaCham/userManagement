<?php

use Illuminate\Http\Request;

Route::post('/employee', 'EmployeeController@create');  // create a new user
/*
 * Request Format
 * 
 {
    "user_id": "1",
    "designation": "manager",
    "department": "human resource",
    "oin_date": "2020-01-01",
    "employee_type": "contract",
    "tire": "tire 1",
    "company_email": "Hansanacham@gmail.com",
    "employee_status": "active",
    "supervisor": "sundaram",
    "manager": "kamla",
    "leave_group": "abc",
    "employee_params" : {
       "working_experence":"5",
       "first_employer":"kamal",
       "last_employer":"suresh",
       "rate":"5000" 
    }
}
*responce code
{
    "id": 1,
    "message": "ok"
}
*/
Route::get('/employee/all', 'EmployeeController@show');  // get all users
/*
* responces
[
    {
        "id": 1,
        "user_id": 1,
        "basic_salary": 5000,
        "ot_category": "cat1",
        "fixed_allowance": 6000,
        "extra_allowance": 1,
        "attendance_type": 1,
        "salary_categoty": "dasd",
        "created_at": "2020-09-11 04:15:58",
        "updated_at": "2020-09-11 04:15:58",
        "deleted_at": null,
        "employee_parameters": [],
        "user": {
            "id": 1,
            "user_name": "root",
            "initials": "w.w.w.root",
            "first_name": null,
            "last_name": null,
            "surname": null,
            "nic": null,
            "date_of_birth": null,
            "gender": "Male",
            "title": null,
            "religion": null,
            "nationality": null,
            "race": null,
            "email": null,
            "mobile": null,
            "land_line": null,
            "status": null,
            "created_at": "2020-09-10 01:48:01",
            "updated_at": "2020-09-10 01:48:01",
            "deleted_at": null,
            "civil_status": null,
            "no": null,
            "street": null,
            "postal": null,
            "city": null,
            "country": null
        }
    },
    
]
*/

Route::get('/employee/{attribute}/{value}', 'EmployeeController@findByAttribute');  // get users by attribute and value

/*
* responces
[
    {
        "id": 1,
        "user_id": 1,
        "basic_salary": 5000,
        "ot_category": "cat1",
        "fixed_allowance": 6000,
        "extra_allowance": 1,
        "attendance_type": 1,
        "salary_categoty": "dasd",
        "created_at": "2020-09-11 04:15:58",
        "updated_at": "2020-09-11 04:15:58",
        "deleted_at": null,
        "employee_parameters": [],
        "user": {
            "id": 1,
            "user_name": "root",
            "initials": "w.w.w.root",
            "first_name": null,
            "last_name": null,
            "surname": null,
            "nic": null,
            "date_of_birth": null,
            "gender": "Male",
            "title": null,
            "religion": null,
            "nationality": null,
            "race": null,
            "email": null,
            "mobile": null,
            "land_line": null,
            "status": null,
            "created_at": "2020-09-10 01:48:01",
            "updated_at": "2020-09-10 01:48:01",
            "deleted_at": null,
            "civil_status": null,
            "no": null,
            "street": null,
            "postal": null,
            "city": null,
            "country": null
        }
    },
*/

Route::get('/employee/{id}', 'EmployeeController@find');  // get users by id

/*  responce
 {
    "id": 5,
    "user_id": 1,
    "basic_salary": 5000,
    "ot_category": "cat1",
    "fixed_allowance": 6000,
    "extra_allowance": 0,
    "attendance_type": 0,
    "salary_categoty": "dasd",
    "created_at": "2020-09-11 04:40:34",
    "updated_at": "2020-09-11 04:40:34",
    "deleted_at": null,
    "employee_parameters": [
        {
            "id": 1,
            "employee_id": 5,
            "name": "name",
            "value": "abc",
            "created_at": "2020-09-11 04:40:34",
            "updated_at": "2020-09-11 04:40:34"
        },
        {
            "id": 2,
            "employee_id": 5,
            "name": "value",
            "value": "hfg",
            "created_at": "2020-09-11 04:40:34",
            "updated_at": "2020-09-11 04:40:34"
        }
    ],
    "user": {
        "id": 1,
        "user_name": "root",
        "initials": "w.w.w.root",
        "first_name": null,
        "last_name": null,
        "surname": null,
        "nic": null,
        "date_of_birth": null,
        "gender": "Male",
        "title": null,
        "religion": null,
        "nationality": null,
        "race": null,
        "email": null,
        "mobile": null,
        "land_line": null,
        "status": null,
        "created_at": "2020-09-10 01:48:01",
        "updated_at": "2020-09-10 01:48:01",
        "deleted_at": null,
        "civil_status": null,
        "no": null,
        "street": null,
        "postal": null,
        "city": null,
        "country": null
    }
}

*/

Route::put('/employee/{id}', 'EmployeeController@store');  // update user by id
/* Request Format
 * {
    "user_name": "hansana",
    "initials": "W.R.H.C.Wijethunga",
    "first_name": "hansana",
    "last_name": "wijethunga",
    "surname": "wijethunga",
    "nic": "960901370V",
    "date_of_birth": "2020-01-01",
    "gender": "Male",
    "title": "gg",
    "religion": "Buddhist",
    "nationality": "Srilankan",
    "race": "ddd",
    "email": "dasd@gmail.com",
    "mobile": "0710576923",
    "land_line": "0710576923",
    "status": "Active",
    "civil_status": "dsas",
    "password": "12345678",
    "address" : "123,456",
    "userParams": {
        "blood": "O+",
        "fsdf": "dasd"
    }
}
}
*responce code
{
    "id": 1,
    "message": "ok"
}
*/
Route::delete('/employee/{id}', 'EmployeeController@delete');  // get users by id
/*
*responce code
{
    "id": 1,
    "message": "ok"
}
*/
