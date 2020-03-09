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

// Route::get('/tt', function () {
//     return view('welcome');
// });

Route::get("{{asset("/")}}","Controller@home");

Route::get("/productsdetails/{id}","Controller@productsdetails");
Route::get("/contacts","Controller@contacts");
Route::get("/listing/{id}","Controller@shop");
Route::get("/shopping/{id}","Controller@shopping");
