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

Route::get('/', 'HomeAdminController@index');

Route::namespace('SystemAdmin')->group(function(){
    Route::resource('department', 'Department');
    Route::resource('department-admin', 'DepartmentAdmin');
    Route::resource('document-type', 'DocumentTypes');
});

Route::namespace('DepartmentAdmin')->group(function(){
    Route::resource('users', 'UserManagement');
    Route::post('/ajaxdp/{id}',[
        'as' => 'users.ajaxdp',
        'uses' => 'UserManagement@ajaxdp'
    ]);
    Route::post('/ajaxps/{id}',[
        'as' => 'users.ajaxps',
        'uses' => 'UserManagement@ajaxps'
    ]);
    Route::get('/ajax-email', [
        'uses' => 'UserManagement@ajaxemail',
        'as' => 'ajax.email',
    ]);
});



