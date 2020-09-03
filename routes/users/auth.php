<?php

/**
 * Views
 */
# get
Route::get('/home', 'HomeController@index')->name('home');
Route::get('/rolls', 'RollController@index')->name('system_Rolls');
Route::get('/users', 'UserController@index');
Route::get('/users/myProfile', 'UserController@myProfile');
Route::get('/users/id/{id}', 'UserController@edit');

Route::get('/logout', 'UserController@logout'); # post
Route::post('/users', 'UserController@create')->name('system_Rolls');
Route::post('/rolls', 'RollController@create')->name('create_system_Rolls');

#put
Route::put('/users/id/{id}', 'UserController@store');
Route::put('/users/password/{id}', 'UserController@storePassword');
Route::put('/users/my_password', 'UserController@changeMyPass');

#delete
Route::delete('/users/id/{id}', 'UserController@delete');
