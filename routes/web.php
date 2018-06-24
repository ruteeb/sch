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

Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index');

Auth::routes();




/**************************************
 * Admin Routes
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
        Route::get('admin/teachers/getclasses', 'TeachersController@getClasses');
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


        // Route Classes
        Route::get('admin/classes', 'ClassesController@index');
        Route::get('admin/classes/create', 'ClassesController@create');
        Route::post('admin/classes/store', 'ClassesController@store');
        Route::get('admin/classes/{id}/view', 'ClassesController@view');
        Route::get('admin/classes/{id}/edit', 'ClassesController@edit');
        Route::post('admin/classes/{id}/update', 'ClassesController@update');
        Route::get('admin/classes/{id}/active', 'ClassesController@active');
        Route::get('admin/classes/{id}/inactive', 'ClassesController@inactive');


        // Route Lessons
        Route::get('admin/lessons', 'LessonsController@index');
        Route::get('admin/lessons-offline', 'LessonsController@offline');
        Route::get('admin/lessons/create', 'LessonsController@create');
        Route::post('admin/lessons/store', 'LessonsController@store');
        Route::get('admin/lessons/{id}/view', 'LessonsController@view');
        Route::get('admin/lessons/{id}/edit', 'LessonsController@edit');
        Route::post('admin/lessons/{id}/update', 'LessonsController@update');
        Route::get('admin/lessons/{id}/active', 'LessonsController@active');
        Route::get('admin/lessons/{id}/inactive', 'LessonsController@inactive');


        // Route Materials
        Route::get('admin/materials', 'MaterialsController@index');
        Route::get('admin/materials/create', 'MaterialsController@create');
        Route::post('admin/materials/store', 'MaterialsController@store');
        Route::get('admin/materials/{id}/view', 'MaterialsController@view');
        Route::get('admin/materials/{id}/edit', 'MaterialsController@edit');
        Route::post('admin/materials/{id}/update', 'MaterialsController@update');
        Route::get('admin/materials/{id}/active', 'MaterialsController@active');
        Route::get('admin/materials/{id}/inactive', 'MaterialsController@inactive');


        // Route Events
        Route::get('admin/events', 'EventsController@index');
        Route::get('admin/events/create', 'EventsController@create');
        Route::post('admin/events/store', 'EventsController@store');
        Route::get('admin/events/{id}/view', 'EventsController@view');
        Route::get('admin/events/{id}/edit', 'EventsController@edit');
        Route::post('admin/events/{id}/update', 'EventsController@update');
        Route::get('admin/events/{id}/active', 'EventsController@active');
        Route::get('admin/events/{id}/inactive', 'EventsController@inactive');




        // Route invoices
        Route::get('admin/invoices', 'InvoiceController@index');
        Route::get('admin/invoices/create', 'InvoiceController@create');
        Route::post('admin/invoices/store', 'InvoiceController@store');
        Route::get('admin/invoices/{id}/view', 'InvoiceController@view');
        Route::get('admin/invoices/{id}/edit', 'InvoiceController@edit');
        Route::post('admin/invoices/{id}/update', 'InvoiceController@update');
        Route::get('admin/invoices/{id}/active', 'InvoiceController@active');
        Route::get('admin/invoices/{id}/inactive', 'InvoiceController@inactive');




    });


});


/**************************************
 * End Admin Routes
 *************************************/




/**************************************
 * Start Front Routes
 **************************************/


Route::group(['namespace' => 'Front'], function () {


    Route::group(['middleware' => 'auth'], function () {
        // User Profile
        Route::get('profile', 'UserController@index');
        Route::post('profile/update', 'UserController@update');

        // Route Online
        Route::get('online', 'VideoController@classOnline');
        // Route Main Class Details
        Route::get('maindetailsclass', 'VideoController@mainDetailsClass');
        // Route Main Class Details
        Route::get('mainclass', 'VideoController@mainClass');
        // Route lesson recording
        Route::get('lessonrecording', 'VideoController@lessonRecording');
    });


    // Route About
    Route::get('about', 'AboutController@index');

    // Route Courses
    Route::get('courses', 'CoursesController@index');
    Route::get('courses/{id}/details', 'CoursesController@view');


    // Route Materials
    Route::get('materials', 'MaterialsController@index');
    Route::get('materials/{id}/details', 'MaterialsController@view');


    // Route Events
    Route::get('events', 'EventsController@index');
    Route::get('events/{id}/details', 'EventsController@view');


    // Route Contact
    Route::get('contact', 'ContactController@index');
    Route::post('contact/send/message', 'ContactController@sendMessage');


    Route::get('search', 'SearchController@searchGet');



});

/**************************************
 * End Front Routes
 **************************************/