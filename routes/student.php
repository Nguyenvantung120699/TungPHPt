<?php
Route::get('student',"StudentController@student");
Route::get('student/create',"StudentController@studentCreate");
Route::post('student/store',"StudentController@studentStore");

Route::get('student/edit/{id}',"StudentController@studentEdit");
Route::post('student/update/{id}',"StudentController@studentUpdate");

Route::get('student/delete/{id}',"StudentController@studentDestroy");