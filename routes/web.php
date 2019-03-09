<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::namespace('Index')->group(function(){
    Route::get('/', 'Dashboard@index');
});

Route::namespace('SystemAdmin')->group(function(){
    Route::resource('department', 'Department');
    Route::resource('users', 'ManageUser');
    Route::resource('department-admin', 'DepartmentAdmin');
});
