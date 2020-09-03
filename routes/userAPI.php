<?php

use Illuminate\Http\Request;

Route::post('/user', 'UserController@create');  // create a new user
/*
 * Request Format
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
Route::get('/user/all', 'UserController@show');  // get all users
/*
* responces
[
    {
        "id": 12,
        "user_name": "hdaddds",
        "initials": "W.R.H.C.Wijethunga",
        "first_name": "hansana",
        "last_name": "wijethunga",
        "surname": "wijethunga",
        "nic": "950901390V",
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
        "api_token": "9FlqJt3lp2kkj8U4BslnquoAtFPsGZ5rXdTAwcrU050mzeKzHTVgHiMvYrFI9JyNnqXrlofMpfxXOOud",
        "created_at": "2020-09-02 12:20:39",
        "updated_at": "2020-09-02 12:20:39",
        "deleted_at": null,
        "civil_status": "dsas",
        "address": null,
        "user_parameters": [
            {
                "id": 5,
                "user_id": 12,
                "name": "blood",
                "value": "O+",
                "created_at": "2020-09-02 12:20:39",
                "updated_at": "2020-09-02 12:20:39"
            },
            {
                "id": 6,
                "user_id": 12,
                "name": "fsdf",
                "value": "dasd",
                "created_at": "2020-09-02 12:20:39",
                "updated_at": "2020-09-02 12:20:39"
            }
        ]
    }
]

*/

Route::get('/user/{attribute}/{value}', 'UserController@findByAttribute');  // get users by attribute and value

/*
* responces
[
    {
        "id": 12,
        "user_name": "hdaddds",
        "initials": "W.R.H.C.Wijethunga",
        "first_name": "hansana",
        "last_name": "wijethunga",
        "surname": "wijethunga",
        "nic": "950901390V",
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
        "api_token": "9FlqJt3lp2kkj8U4BslnquoAtFPsGZ5rXdTAwcrU050mzeKzHTVgHiMvYrFI9JyNnqXrlofMpfxXOOud",
        "created_at": "2020-09-02 12:20:39",
        "updated_at": "2020-09-02 12:20:39",
        "deleted_at": null,
        "civil_status": "dsas",
        "address": null,
        "user_parameters": [
            {
                "id": 5,
                "user_id": 12,
                "name": "blood",
                "value": "O+",
                "created_at": "2020-09-02 12:20:39",
                "updated_at": "2020-09-02 12:20:39"
            },
            {
                "id": 6,
                "user_id": 12,
                "name": "fsdf",
                "value": "dasd",
                "created_at": "2020-09-02 12:20:39",
                "updated_at": "2020-09-02 12:20:39"
            }
        ]
    }
]

*/

Route::get('/user/{user_id}', 'UserController@find');  // get users by id

/*  responce
 {
        "id": 12,
        "user_name": "hdaddds",
        "initials": "W.R.H.C.Wijethunga",
        "first_name": "hansana",
        "last_name": "wijethunga",
        "surname": "wijethunga",
        "nic": "950901390V",
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
        "api_token": "9FlqJt3lp2kkj8U4BslnquoAtFPsGZ5rXdTAwcrU050mzeKzHTVgHiMvYrFI9JyNnqXrlofMpfxXOOud",
        "created_at": "2020-09-02 12:20:39",
        "updated_at": "2020-09-02 12:20:39",
        "deleted_at": null,
        "civil_status": "dsas",
        "address": null,
        "user_parameters": [
            {
                "id": 5,
                "user_id": 12,
                "name": "blood",
                "value": "O+",
                "created_at": "2020-09-02 12:20:39",
                "updated_at": "2020-09-02 12:20:39"
            },
            {
                "id": 6,
                "user_id": 12,
                "name": "fsdf",
                "value": "dasd",
                "created_at": "2020-09-02 12:20:39",
                "updated_at": "2020-09-02 12:20:39"
            }
        ]
    }

*/

Route::put('/user/{user_id}', 'UserController@store');  // update user by id
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
Route::delete('/user/{user_id}', 'UserController@delete');  // get users by id
/*
*responce code
{
    "id": 1,
    "message": "ok"
}
*/
