<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use App\Mail\OrederCreate;
use App\Products;
use App\Category;
use App\Order;
use App\OrderProduct;
use App\User;
use App\Brand;
use App\Mail\CancelOrder;


class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
 
    public function home(){
        // if(is_admin()){
        //     die("admin day");
        // }
        $newests = Products::orderBy('created_at','desc')->take(12)->get();
        // $products = Products::orderBy('created_at','desc')->take(10)->get();
        $cheaps = Products::orderBy('price','asc')->take(8)->get();
        $exs = Products::orderBy('quantity','desc')->take(8)->get();
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
    public function shopproduct($id){
        // $newests = Products::orderBy('created_at','desc')->take(12)->get();     
        // $cheaps = Products::orderBy('price','asc')->take(8)->get();
        // $exs = Products::orderBy('price','desc')->take(8)->get();   
        // return view("shopProduct",['newests'=>$newests,'cheaps'=>$cheaps,'exs'=>$exs]);
        $newests = Products::orderBy('created_at','desc')->take(12)->get(); 
        $products = Products::where("category_id",$id)->take(9)->get();

        return view("shopProduct",['product'=>$products,'newests'=>$newests]);
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

        $cart_total =0;
        foreach ($cart as $p){
            $cart_total +=($p->price*$p->cart_qty);
        }

        return view("cart.cartUser",["cart"=>$cart,"cart_total"=>$cart_total]);
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
        // Mail::to("ntung9921@gmail.com")->send(new OrederCreate($order));
        Mail::to(Auth::user()->email)->send(new OrederCreate($order));
        return redirect()->to("/checkoutSuccess");

    }

    //confirm 

    public function checkoutSuccess(){
        // $order = Order::find($id);
        // // $id = Auth::id();
        // $odp = OrderProduct::where('order_id','desc')->get();
        return view('oderSuccess');
    }

    public function historyOder($id){
            $id = Auth::id();
            $newests = Order::where('user_id',$id)->orderBy('created_at','desc')->get();
            return view('orderHistory',['newests'=>$newests]);  
        }

        public function viewOrder($id)
        {
            $order = Order::find($id);
            $order_product = OrderProduct::all()->where("order_id", $id);
    
            return view("viewOrder", [
                "order" => $order,
                "order_product" => $order_product
            ]);
        }



        public function addOrder($id)
    {
        $order = Order::find($id);
        $order_product = OrderProduct::all()->where("order_id", $id);
        $new_order = $order->replicate();
        $new_order->status = Order::STATUS_PENDING;
        $new_order->save();
        foreach ($order_product as $p) {
            DB::table("orders_products")->insert([
                'order_id' => $new_order->id,
                'product_id' => $p->product_id,
                'qty' => $p->qty,
                'price' => $p->price
            ]);
        }

        Mail::to(Auth::user()->email)->send(new OrederCreate($order));
        return redirect()->to("/checkoutSuccess");
    }



    public function deleteOrder($id)
    {
        $order = Order::find($id);
        try {
            if ($order->status != Order::STATUS_CANCEL) {
                $order->status = Order::STATUS_CANCEL;
                $order->save();
            }
        } catch (\Exception $e) {
            return redirect()->back();
        }
       Mail::to(Auth::user()->email)->send(new CancelOrder($order));
            return redirect()->to("/deletecomplete");
    }

    public function deleteComplete(){
        return view('deleteCompelete');
    }




    private function formatOrder($order)
    {
        switch ($order->payment_total) {
            case 'cod':
                $order->payment_total = 'Cheque Payment';
                break;
            case 'paypal':
                $order->payment_total = 'Paypal';
                break;

        }
        switch ($order->status) {
            case '0':
                $order->status = 'STATUS_PENDING';
                break;

            case '1':
                $order->status = 'STATUS_PROCESS';
                break;

            case '2':
                $order->status = 'STATUS_SHIPPING';
                break;

            case '3':
                $order->status = 'STATUS_COMPLETE';
                break;

            case '4':
                $order->status = 'STATUS_CANCEL';
                break;
        }
        return $order;
    }



    public function loginok($id){
        $id = Auth::id();
        $user = User::find($id);
        $nameuser = User::all()->where("id", $id);
        return view('html.header',['nameuser'=>$nameuser,'user'=>$user]);
    }
}
