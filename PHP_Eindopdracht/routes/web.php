<?php

use Illuminate\Support\Facades\Route;

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



Auth::routes();
Route::get('/', 'DashboardController@index')->name('Dashboard');;
Route::get('/home', 'DashboardController@index');
Route::get('/dashboard', 'DashboardController@index')->name('Dashboard');
Route::get('/auth/unauthorized', 'UnauthorizedController@index');

Route::group(['middleware' => 'admin'], function(){
    Route::get('/admin', 'AdminController@index');

    Route::get('/addTeacher', 'TeacherController@create');
    Route::post('/teacher', 'TeacherController@store');
    Route::get('/editTeacher/{id}', 'TeacherController@edit');
    Route::patch('/editTeacher/{id}', 'TeacherController@update');
    Route::delete('/teacher/{id}', 'TeacherController@destroy')->name('teacher.destroyTeacher');

    Route::get('/addCourse', 'CourseController@create');
    Route::post('/course', 'CourseController@store');
    Route::post('/giveGrade/{id}', 'CourseController@giveGrade');
    Route::get('/editCourse/{id}', 'CourseController@edit');
    Route::patch('/editCourse/{id}', 'CourseController@update');
    Route::delete('/course/{id}', 'CourseController@destroy')->name('course.destroyCourse');

    Route::post('/upload/{id}', 'UploadController@store');
});

Route::group(['middleware' => 'manager'], function(){
    Route::get('/deadline', 'DeadlineController@index');
    Route::get('/addDeadline', 'DeadlineController@create');
    Route::post('/deadline', 'DeadlineController@store');
    Route::patch('/deadline/finish', 'DeadlineController@finish');
});

