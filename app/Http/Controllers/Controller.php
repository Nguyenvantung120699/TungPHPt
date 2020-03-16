<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use App\Products;
use App\Category;
use App\Brand;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function home(){
        $newests = Products::orderBy('created_at','desc')->take(10)->get();
        // $products = Products::orderBy('created_at','desc')->take(10)->get();
        $cheaps = Products::orderBy('price','asc')->take(10)->get();
        $exs = Products::orderBy('price','desc')->take(10)->get();
        return view("home",['newests'=>$newests,'cheaps'=>$cheaps,'exs'=>$exs]);
        }

    public function productsdetails($id){
        // $products = Products::find(1);
        // $category_product = Products::where("category_id",$products->category_id)->where('id',"!=",$products->id)->take(10)->get();
        // $brand_product = Products::where("brand_id",$products->brand_id)->where('id',"!=",$products->id)->take(10)->get();
        // return view("productsDetails",['products'=>$products,'category_product'=>$category_product,'brand_product'=>$brand_product]);

            $product = Products::find($id);// tra ve 1 object Product theo id
        //     $category = Category::find($product->category_id);
             $category_products = Products::where("category_id",$product->category_id)->where('id',"!=",$product->id)->take(10)->get();
             $brand_products = Products::where("brand_id",$product->brand_id)->where('id',"!=",$product->id)->take(10)->get();
             return view('productsDetails',['product'=>$product,'category_products'=>$category_products,'brand_products'=>$brand_products]);
    }
    public function shop($id){
        $category = Category::find($id);
        $so_luong_sp = $category->Products()->count(); // ra so luong san pham
       // $category->Products ;// Lay tat ca product cua category nay
        // neu muon lay 1 so luong nhat dinh 10 san pham
       // $category->Products()->orderBy('price','desc')->take(10)->get();
        return view("shop",['category'=>$category]);
    }
    // public function listing(){
    //     $category = Category::all();
    //     //$so_luong_sp = $category->Products()->count(); // ra so luong san pham
    //    // $category->Products ;// Lay tat ca product cua category nay
    //     // neu muon lay 1 so luong nhat dinh 10 san pham
    //    // $category->Products()->orderBy('price','desc')->take(10)->get();
    //      return view("shop",['category'=>$category]);
    // }
    public function contacts($id){
        return view("contacts");
    }

    public function shopping($id){
        $product = Products::find($id);
        $product->update([
            "quantity" => $product->quantity-1
        ]);
        return redirect()->to("productsdetails/{$product->id}");
    }

    public function filter($c_id,$b_id){
        $products = Products::where('category_id',$c_id)->where('brand_id',$b_id)->get();
    }
}
