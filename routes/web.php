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

Route::get('/admin', 'HomeAdminController@index');
Route::get('/', 'HomeController@index');

Route::namespace('Document')->group(function(){

    Route::resource('department', 'DepartmentController');
    Route::get('/deparment-archived', [
        'as' => 'department-archived',
        'uses' => 'DepartmentController@archive'
    ]);
    Route::resource('department-admin', 'DepartmentAdmin');
    Route::resource('document-type', 'DocumentTypeController');
    Route::get('/document-type-archived', [
        'as' => 'document-type-archived',
        'uses' => 'DocumentTypeController@archive'
    ]);
    Route::put('/document-type-restore/{id}', [
        'as' => 'document-type-restore',
        'uses' => 'DocumentTypeController@restore'
    ]);

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


Route::namespace('Document')->group(function(){
    Route::resource('document', 'DocumentController');
});