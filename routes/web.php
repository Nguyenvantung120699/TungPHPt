<?php
//route for admin
Route::prefix("admin")->middleware("checkAdmin")->group(function (){
    include_once("admin.php");
});

Route::prefix("cart")->middleware("checkUser")->group(function (){
    include_once("cart.php");
});

Route::prefix("student")->group(function (){
    include_once("student.php");
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
Route::get("/shop/{id}","Controller@shop");
Route::get("/shopproduct/{id}","Controller@shopproduct");
Route::get("/shopcategory/{id}","Controller@shopcategory");
Route::get("/shopping/{id}","Controller@shopping")->middleware("auth");

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/logout',function(){
    \Illuminate\Support\Facades\Auth::logout();
    session()->flush();
    return redirect()->to("/login");
});

Route::get("/checkout","Controller@checkout")->middleware("auth");
Route::post("/checkout","Controller@placeOrder")->middleware("auth");
Route::get("/checkoutSuccess",'Controller@checkoutSuccess')->middleware("auth");

Route::get("/historyoder/{id}",'Controller@historyOder')->middleware("auth");
Route::get("viewOrder/{id}",'Controller@viewOrder')->middleware("auth");
Route::get("/addorder/{id}",'Controller@addOrder')->middleware("auth");
Route::get("/deleteOrder/{id}",'Controller@deleteOrder')->middleware("auth");
Route::get("/deletecomplete",'Controller@deleteComplete')->middleware("auth");

