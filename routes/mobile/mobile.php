<?php

use Illuminate\Http\Request;
// users 
Route::prefix('/user')->group(function () {
    Route::post('mobile_login', 'CustomLoginController@login');
    Route::middleware('auth:mob')->post('/test', 'MobileController@test');
});

Route::prefix('/data/get')->group(function () {
    Route::get('/vehicles', 'MobileController@vehicles');
    Route::get('/drivers', 'MobileController@drivers');
    Route::get('/sessions', 'MobileController@sessions');
    Route::get('/authorities', 'MobileController@loacaAuthorities');
    Route::get('/wasteTypes', 'MobileController@wasteTypes');
    Route::get('/ratios', 'MobileController@ratios');
    Route::get('/transferStations', 'MobileController@transferStations');
    Route::get('/plants', 'MobileController@plants');
    Route::get('/dumpsites', 'MobileController@dumpsites');
});
Route::prefix('/data/post')->group(function () {
    Route::post('/data', 'MobileController@sync');
});
