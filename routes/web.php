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
        Route::get('admin/admins/{id}/delete', 'AdminsController@destroy');
        Route::post('admin/admins/multidelete', 'AdminsController@multidelete');



    });


});