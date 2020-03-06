<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Products;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $products = Products::take(8)->get();
        return view("home",['products'=>$products]);
        }

    public function productsdetails(){

        return view("productsDetails");
    
        }

    public function contacts(){

        return view("contacts");
    
        }
    public function shop(){
        $products = Products::where("category_id",5)->take(9)->orderBy('product_name','asc')->get();// loc theo category
        return view("shop",['products'=>$products]);
    }
}
