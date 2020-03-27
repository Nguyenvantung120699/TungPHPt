@extends('layout')



@section('content')
<section class="banner-area organic-breadcrumb">
        <div class="container">
            <div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
                <div class="col-first">
                    <h1>Shopping Cart</h1>
                    <nav class="d-flex align-items-center">
                        <a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
                        <a href="category.html">Cart</a>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- End Banner Area -->

    <!--================Cart Area =================-->
    <section class="cart_area">
        <div class="container">

            <div class="cart_inner">
                <div class="table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th scope="col">Product</th>
                                <th scope="col">Price</th>
                                <th scope="col">Qty</th>
                            </tr>
                        </thead>
                        @foreach($cart as $p)
                        <tbody>
                            <tr>
                                <td>
                                    <div class="media">
                                        <div class="d-flex ">
                                            <p>{{$p->product_name}}</p>
                                        </div>
                                        <div class="media-body">
                                            <img style="width:20%" src="{{$p->thumbnail}}" alt="">
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <h5>{{$p->price}}</h5>
                                </td>
                                <td>
                                    {{$p->cart_qty}}
                                </td>
                            </tr>
                            <!-- <h5>{{$p->total}}</h5> -->
                            @endforeach
                            <tr class="bottom_button">
                                <td>
                                    <a class="gray_btn" href="#">Update Cart</a>
                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="cupon_text d-flex align-items-center">
                                        <input type="text" placeholder="Coupon Code">
                                        <a class="primary-btn" href="#">Apply</a>
                                        <a class="primary-btn" href="#">Close Coupon</a>
                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <h5>Subtotal</h5>
                                </td>
                                <td>
                                    <h5>$ {{$cart_total}}</h5>
                                </td>
                            </tr>
                            <tr class="out_button_area">
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>

                                </td>
                                <td>
                                    <div class="checkout_btn_inner d-flex align-items-center">
                                        <a class="primary-btn" href="{{url("/shopproduct/2")}}">Continue Shopping</a>
                                        <a class="primary-btn" href="{{url("/checkout")}}">Proceed to checkout</a>
                                    </div>
                                </td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
@endsection