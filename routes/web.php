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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();
Route::get('home', 'HomeController@index')->name('home');




/**************************************
 * Admin Controllers
**************************************/

Route::group(['namespace' => 'Admin'], function () {


    Route::group(['middleware' => 'adminGuest:admin'], function () {
        // Route Login
        Route::get('admin/login', 'AdminController@login_get');
        Route::post('admin/login', 'AdminController@login_post');

    });


    Route::group(['middleware' => 'adminWeb:admin'], function () {

        // Route Logout
        Route::get('admin/logout', 'AdminController@logout');
        // Route Home
        Route::get('admin/home', 'HomeController@index');


        // Route Setting
        Route::get('admin/setting', 'SettingController@index');
        Route::post('admin/setting/update', 'SettingController@update');


        // Route Profile
        Route::get('admin/profile', 'ProfileController@index');
        Route::post('admin/profile/update', 'ProfileController@update');


        // Route Admins
        Route::get('admin/admins', 'AdminsController@index');
        Route::get('admin/admins/create', 'AdminsController@create');
        Route::post('admin/admins/store', 'AdminsController@store');
        Route::get('admin/admins/{id}/edit', 'AdminsController@edit');
        Route::post('admin/admins/{id}/update', 'AdminsController@update');
        Route::get('admin/admins/{id}/active', 'AdminsController@active');
        Route::get('admin/admins/{id}/inactive', 'AdminsController@inactive');
//        Route::get('admin/admins/{id}/delete', 'AdminsController@destroy');
//        Route::post('admin/admins/multidelete', 'AdminsController@multidelete');

        // Route Teachers
        Route::get('admin/teachers', 'TeachersController@index');
        Route::get('admin/teachers/create', 'TeachersController@create');
        Route::post('admin/teachers/store', 'TeachersController@store');
        Route::get('admin/teachers/{id}/view', 'TeachersController@view');
        Route::get('admin/teachers/{id}/edit', 'TeachersController@edit');
        Route::post('admin/teachers/{id}/update', 'TeachersController@update');
        Route::get('admin/teachers/{id}/active', 'TeachersController@active');
        Route::get('admin/teachers/{id}/inactive', 'TeachersController@inactive');
//        Route::get('admin/teachers/{id}/delete', 'TeachersController@destroy');
//        Route::post('admin/teachers/multidelete', 'TeachersController@multidelete');


        // Route Students
        Route::get('admin/students', 'StudentsController@index');
        Route::get('admin/students/create', 'StudentsController@create');
        Route::post('admin/students/store', 'StudentsController@store');
        Route::get('admin/students/{id}/view', 'StudentsController@view');
        Route::get('admin/students/{id}/edit', 'StudentsController@edit');
        Route::post('admin/students/{id}/update', 'StudentsController@update');
        Route::get('admin/students/{id}/active', 'StudentsController@active');
        Route::get('admin/students/{id}/inactive', 'StudentsController@inactive');
//        Route::get('admin/students/{id}/delete', 'StudentsController@destroy');
//        Route::post('admin/students/multidelete', 'StudentsController@multidelete');




        // Route Course
        Route::get('admin/courses', 'CoursesController@index');
        Route::get('admin/courses/create', 'CoursesController@create');
        Route::post('admin/courses/store', 'CoursesController@store');
        Route::get('admin/courses/{id}/view', 'CoursesController@view');
        Route::get('admin/courses/{id}/edit', 'CoursesController@edit');
        Route::post('admin/courses/{id}/update', 'CoursesController@update');
        Route::get('admin/courses/{id}/active', 'CoursesController@active');
        Route::get('admin/courses/{id}/inactive', 'CoursesController@inactive');



    });


});