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
Route::resource('login', 'LoginController');
Route::resource('forgot-password', 'ForgotPasswordController');

Route::get('404', [
    'as' => 'not-found',
    'uses' =>  'ErrorController@notFound'
]);

Route::group(['middleware' => 'checkUser'], function() {
    
    Route::get('/', [
        'as' => 'home-page',
        'uses' =>  'HomeController@index'
    ]);
    Route::namespace('DepartmentAdmin')->group(function() {
        Route::resource('users', 'UserManagementController');

        Route::get('/ajax-email', [
            'uses' => 'UserManagementController@ajaxEmail',
            'as' => 'ajax.email',
        ]);

        Route::get('/archive', [
            'uses' => 'UserManagementController@archiveIndex',
            'as' => 'users.archive',
        ]);

        Route::put('/archive-restore/{id}', [
            'uses' => 'UserManagementController@restore',
            'as' => 'users.archive.restore',
        ]);

        Route::get('/add-user-exists', [
            'uses' => 'UserManagementController@indexOfAdd',
            'as' => 'add.user.exists',
        ]);

        Route::post('/add-user-exists', [
            'uses' => 'UserManagementController@addUserExist',
            'as' => 'users.exists',
        ]);

    });
    Route::namespace('Document')->group(function() {

        Route::resource('document', 'DocumentController');    
    });
});

Route::prefix('admin')->middleware('checkIsAdmin')->group(function () {

    Route::get('/', [
        'as' => 'admin-index',
        'uses' => 'HomeAdminController@index',
    ]);

    Route::namespace('SystemAdmin')->middleware('checkSysAdmin')->group(function () {

        //department
        Route::resource('department', 'DepartmentController');

        Route::get('/deparment-archived', [
            'as' => 'department-archived',
            'uses' => 'DepartmentController@archive',
        ]);

        Route::put('/department-restore/{id}', [
            'as' => 'department-restore',
            'uses' => 'DepartmentController@restore'
        ]);

        //department admin
        Route::resource('department-admin', 'DepartmentAdminController');

        Route::get('/deparment-admin-archived', [
            'as' => 'department-admin-archived',
            'uses' => 'DepartmentAdminController@archive',
        ]);

        Route::put('/department-admin-restore/{id}', [
            'as' => 'department-admin-restore',
            'uses' => 'DepartmentAdminController@restore'
        ]);

        //department user
        Route::resource('department-user', 'DepartmentUserController');

        Route::get('/deparment-user-archived', [
            'as' => 'department-user-archived',
            'uses' => 'DepartmentUserController@archive',
        ]);

        Route::put('/department-user-restore/{id}', [
            'as' => 'department-user-restore',
            'uses' => 'DepartmentUserController@restore'
        ]);

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

        //infrastructure
        Route::post('/infrastructure-department/{id}', [
            'uses' => 'InfrastructureManagementController@changeDepartment',
            'as' => 'infrastructure.department',
        ]);

        Route::resource('infrastructure', 'InfrastructureManagementController');

        Route::get('/infrastructure-archive', [
            'uses' => 'InfrastructureManagementController@archiveIndex',
            'as' => 'infrastructure.archive',
        ]);
        Route::put('/infrastructure-archive-restore/{id}', [
            'uses' => 'InfrastructureManagementController@restore',
            'as' => 'infrastructure.archive.restore',
        ]);

        //users
        Route::resource('admin-users', 'UserManagementController');
        Route::post('/ajaxdp/{id}',[
            'as' => 'admin-users.ajaxdp',
            'uses' => 'UserManagementController@ajaxdp'
        ]);

        Route::get('/archive', [
            'uses' => 'UserManagementController@archiveIndex',
            'as' => 'admin-users.archive',
        ]);

        Route::put('/archive-restore/{id}', [
            'uses' => 'UserManagementController@restore',
            'as' => 'admin-users.archive.restore',
        ]);

    });

    Route::namespace('DepartmentAdmin')->middleware('checkDepAdmin')->group(function() {

        Route::resource('forms', 'FormManagementController');
        Route::get('/download/{id}', [
            'uses' => 'FormManagementController@download',
            'as' => 'forms.download',
        ]);

        Route::get('/form-archive', [
            'uses' => 'FormManagementController@archiveIndex',
            'as' => 'forms.archive',
        ]);

        Route::put('/form-restore/{id}', [
            'uses' => 'FormManagementController@restore',
            'as' => 'forms.archive.restore',
        ]);
    });
});
