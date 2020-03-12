<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use App\Brand;
use App\Products;

class AdminController extends Controller
{
    public function category(){
        $categories = Category::all();
        return view('admin.category.index',['categories'=>$categories]);
    }
    public function categoryCreate(){
        return view('admin.category.create');
    }

    public function categoryStore(Request $request){
        $request->validate([
            "category_name"=>"required"
        ]);
        try{
            Category::create([
                "category_name"=> $request->get("category_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("{{url('admin/category')}}");
    }



    // ham admin brand
    public function brand(){
        $brands = Brand::all();
        return view('admin.brand.index',['brands'=>$brands]);
    }

    public function brandCreate(){
        return view('admin.brand.create');
    }

    public function brandStore(Request $request){
        $request->validate([
            "brand_name"=>"required"
        ]);
        try{
            Brand::create([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("{{url('admin/brand')}}");
    }

    
    // ham admin product
    public function product(){
        $products = Products::all();
        return view('admin.product.index',['products'=>$products]);
    }

    public function productCreate(){
        return view('admin.product.create');
    }

    public function productStore(Request $request){
        $request->validate([
            "product_name"=>"required",
            "product_desc"=>"required",
            "thumbnail"=>"required",
            "gallery"=>"required",
            "category_id"=>"required",
            "brand_id"=>"required",
            "price"=>"required",
            "quantity"=>"required"
        ]);
        try{
            Products::create([
                "product_name"=> $request->get("product_name"),
                "product_desc"=> $request->get("product_desc"),
                "thumbnail"=> $request->get("thumbnail"),
                "gallery"=> $request->get("gallery"),
                "category_id"=> $request->get("category_id"),
                "brand_id"=> $request->get("brand_id"),
                "price"=> $request->get("price"),
                "quantity"=> $request->get("quantity")

            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("{{url('admin/product')}}");
    }
}