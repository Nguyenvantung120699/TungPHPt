<?php
Route::get('student',"StudentController@student");
Route::get('student/create',"StudentController@studentCreate");
Route::post('student/store',"StudentController@studentStore");