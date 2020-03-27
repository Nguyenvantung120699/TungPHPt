<?php
Route::get('student',"StudentController@student");
Route::get('student/create',"StudentController@studentCreate");
Route::post('student/store',"StudentController@studentStore");

Route::get('student/edit/{id}',"AdminController@studentEdit");
Route::post('student/update/{id}',"AdminController@studentUpdate");

Route::get('student/delete/{id}',"AdminController@studentDestroy");