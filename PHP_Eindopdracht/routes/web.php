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

Route::get('/', function () {
    return view('../Dashboard/index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin', 'AdminController@index');

Route::get('/addTeacher', 'TeacherController@create');
Route::post('/teacher', 'TeacherController@store');
Route::get('/editTeacher/{id}', 'TeacherController@edit');
Route::patch('/editTeacher/{id}', 'TeacherController@update');
Route::delete('/teacher/{id}', 'TeacherController@destroy')->name('teacher.destroyTeacher');

Route::get('/addCourse', 'CourseController@create');
Route::post('/course', 'CourseController@store');
Route::get('/editCourse/{id}', 'CourseController@edit');
Route::patch('/editCourse/{id}', 'CourseController@update');
Route::delete('/course/{id}', 'CourseController@destroy')->name('course.destroyCourse');

Route::get('/deadline', 'DeadlineController@index');
Route::get('/addDeadline', 'DeadlineController@create');
Route::post('/deadline', 'DeadlineController@store');
