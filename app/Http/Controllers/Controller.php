<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Products;
use App\Category;
use App\Order;
use App\Brand;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
    public function home(){
        $newests = Products::orderBy('created_at','desc')->take(12)->get();
        // $products = Products::orderBy('created_at','desc')->take(10)->get();
        $cheaps = Products::orderBy('price','asc')->take(8)->get();
        $exs = Products::orderBy('price','desc')->take(8)->get();
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

    public function shopping($id,Request $request){
        $product = Products::find($id);
        $cart = $request->session()->get("cart");
        if($cart == null){
            $cart = [];
        }
        foreach($cart as $p){
            if($p->id == $product->id){
                $p->cart_qty = $p->cart_qty+1;
                session(["cart"=>$cart]);
                return redirect()->to("/cart/carts");
            }
        }
        $product->cart_qty = 1;
        $cart[] = $product;
        session(["cart"=>$cart]);
        return redirect()->to("/cart/carts");

    }

    public function cart(Request $request){ 
        $cart = $request->session()->get("cart");
        if($cart == null){
            $cart = [];
        }
        // $total = 0;
        // foreach($cart as $p){
        //     $total += ($p->price*$p->cart_qty);
        // }
        return view("cart.cartUser",["cart"=>$cart]);

    }

        public function filter($c_id,$b_id){
        $products = Products::where('category_id',$c_id)->where('brand_id',$b_id)->get();
    }

        public function contacts(){
        return view("contacts");
    }

    public function checkout(Request $request){
        if(!$request->session()->has("cart")){
            return redirect()->to("/");
        }
        return view("checkout");
    }

    public function placeOrder(Request $request){
        $request->validate([
            "customer_name" =>"required|string",
            "address" => "required",
            "payment_method" => "required",
            "telephone" => "required",
        ]);
        $cart = $request->session()->get('cart');
        $grand_total = 0;
        foreach($cart as $p){
            $grand_total +=($p->price*$p->cart_qty);
        }

        $order = Order::create([
            "user_id" =>Auth::id(),
            "customer_name" => $request->get("customer_name"),
            "shipping_address" => $request->get("address"),
            "telephone" => $request->get("telephone"),
            "grand_total" => $grand_total,
            "payment_method" => $request->get("payment_method"),
            "status" => Order::STATUS_PENDING,
        ]);
        foreach ($cart as $p){
            DB::table("orders_products")->insert([
                'order_id'=> $order->id,
                'product_id'=>$p->id,
                'qty'=>$p->cart_qty,
                'price'=>$p->price
            ]);
        }
        session()->forget('cart');
        return redirect()->to("/checkoutSuccess");

    }

    public function checkoutSuccess(){
        return view("checkout_success");
    }

}
