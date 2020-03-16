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
            "category_name"=> "required|string|unique:category"
        ]);
        try{
            Category::create([
                "category_name"=> $request->get("category_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }


    public function categoryEdit($id){
        $categories = Category::find($id);
        return view("admin.category.edit",['categories'=>$categories]);
    }
    public function categoryUpdate($id,Request $request){
        $categories = Category::find($id);
        $request->validate([ // truyen vao rules de validate
            "category_name"=> "required|string|unique:category,category_name,".$id
        ]);
        try {
            $categories->update([
                "category_name"=> $request->get('category_name')
            ]);
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
    }



    public function categoryDestroy($id){
        $categories = Category::find($id);
        try {
            $categories->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/category");
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
            "category_name"=> "required|string|unique:category"
        ]);
        try{
            Brand::create([
                "brand_name"=> $request->get("brand_name")
            ]);
        }catch(\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
    }


    public function brandEdit($id){
        $brands = Brand::find($id);
        return view('admin.brand.edit',['brands'=>$brands]);
    }
    public function brandUpdate($id,Request $request){
       $brands = Brand::find($id);
       $request->validate([
        "brand_name"=> "required|string|unique:brand,brand_name,".$id
    ]);

    try{
        $brands->update([
            "brand_name"=> $request->get("brand_name")
        ]);
    }catch(\Exception $e){
        return redirect()->back();
    }
    return redirect()->to("admin/brand");
    }


    public function brandDestroy($id){
        $brands = Brand::find($id);
        try {
            $brands->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/brand");
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
        return redirect()->to("admin/product");
    }


    public function productEdit($id){
        $products = Products::find($id);
        return view('admin.product.edit',['products'=>$products]);
    }
    public function productUpdate($id,Request $request){
       $products = Products::find($id);
       $request->validate([
        "product_name"=> "required|string|unique:products,product_name,".$id
    ]);

    try{
        $products->update([
            "product_name"=> $request->get("product_name")
        ]);
    }catch(\Exception $e){
        return redirect()->back();
    }
    return redirect()->to("admin/product");
    }


    public function productDestroy($id){
        $products = Products::find($id);
        try {
            $products->delete(); // xoa cung // CRUD
            // xoa mem
            // them 1 truong status : 0: Inactive; 1: active
            // chuyen status tu 1 -> 0
        }catch (\Exception $e){
            return redirect()->back();
        }
        return redirect()->to("admin/product");
    }
    
}