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
        $products = Products::orderBy('created_at','desc')->take(10)->get();
        $cheaps = Products::orderBy('price','asc')->take(10)->get();
        $exs = Products::orderBy('price','desc')->take(10)->get();
        return view("home",['products'=>$products,'cheaps'=>$cheaps,'exs'=>$exs]);
        }

    public function productsdetails(){
        $products = Products::find(1);
        $category_product = Products::where("category_id",$products->category_id)->where('id',"!=",$products->id)->take(10)->get();
        $brand_product = Products::where("brand_id",$products->brand_id)->where('id',"!=",$products->id)->take(10)->get();
        return view("productsDetails",['products'=>$products,'category_product'=>$category_product,'brand_product'=>$brand_product]);
    }
    public function shop($id){
        $products = Products::where("category_id",$id)->take(20)->orderBy('product_name','asc')->get();// loc theo category
        return view("shop",['products'=>$products]);
    }
}
