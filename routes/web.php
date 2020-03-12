<?php
//route for admin
Route::prefix("admin")->group(function (){
    include_once("admin.php");
});
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

Route::get("/","Controller@home");

Route::get("/productsdetails/{id}","Controller@productsdetails");
Route::get("/contacts","Controller@contacts");
Route::get("/shop/{id}","Controller@listing");
Route::get("/shopping/{id}","Controller@shopping");
