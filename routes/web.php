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

Route::namespace ('SystemAdmin')->group(function () {

    Route::resource('department', 'DepartmentController');

    Route::get('/deparment-archived', [
        'as' => 'department-archived',
        'uses' => 'DepartmentController@archive',
    ]);

    Route::put('/department-restore/{id}', [
        'as' => 'department-restore',
        'uses' => 'DepartmentController@restore'
    ]);

    Route::resource('department-admin', 'DepartmentAdmin');

    //document-type
    Route::resource('document-type', 'DocumentTypeController');

    Route::get('/document-type-archived', [
        'as' => 'document-type-archived',
        'uses' => 'DocumentTypeController@archive',
    ]);

    Route::put('/document-type-restore/{id}', [
        'as' => 'document-type-restore',
        'uses' => 'DocumentTypeController@restore',
    ]);

    //collaboration-unit
    Route::resource('collaboration-unit', 'CollaborationUnitController');

    Route::get('/collaboration-unit-archived', [
        'as' => 'collaboration-unit-archived',
        'uses' => 'CollaborationUnitController@archive',
    ]);

    Route::put('/collaboration-unit-restore/{id}', [
        'as' => 'collaboration-unit-restore',
        'uses' => 'CollaborationUnitController@restore',
    ]);
});

Route::namespace('DepartmentAdmin')->group(function(){

    Route::resource('users', 'UserManagementController');

    Route::post('/ajaxdp/{id}',[
        'as' => 'users.ajaxdp',
        'uses' => 'UserManagementController@ajaxdp'
    ]);

    Route::post('/ajaxps/{id}',[
        'as' => 'users.ajaxps',
        'uses' => 'UserManagementController@ajaxps'
    ]);

    Route::get('/ajax-email', [
        'uses' => 'UserManagementController@ajaxemail',
        'as' => 'ajax.email',
    ]);

});


Route::namespace('Document')->group(function(){
    Route::resource('document', 'DocumentController');
});
