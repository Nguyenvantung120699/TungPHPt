@extends('layout')


@ssection('title',"thanh toán")
@section('content')

<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->


    <section class="checkout_area section_gap">
        <div class="container">
            <div class="billing_details">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>Billing Details</h3>
                        <form class="row contact_form" action="{{url("/checkout")}}" method="POST" novalidate="novalidate">
                                @csrf
                                <div class="col-md-12">
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="customer_name" placeholder="Tên khách hàng *" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="address" placeholder="địa chỉ *" required>
                                    </div>
                                    <div class="col-md-12 form-group p_star">
                                        <input type="text" class="form-control" name="telephone" placeholder="điện thoại *" required>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                <div class="order_box">
                                    <h2>Your Order</h2>
                                    <ul class="list">
                                        <li><a href="#">Product <span>Total</span></a></li>
                                        @php $total = 0; @endphp
                                        @foreach(session('cart') as $p)
                                        <li><a href="#">{{$p->product_name}}<span class="middle">{{$p->cart_qty}}</span> <span class="last">${{$p->price}}</span></a></li>
                                        @php $total+=($p->cart_qty*$p->price) @endphp
                                        @endforeach
                                    </ul>
                                    <ul class="list list_2">
                
                                        <li><a href="#">Total <span>${{number_format($total,2)}}</span></a></li>
                                    </ul>
                                    <div class="checkbox-items">
                                        <div class="payment-method" style="margin-top:0">
                                            <div class="pm-item">
                                                <input type="radio" value="paypal" name="payment_method" id="one">
                                                <label for="one">Paypal</label>
                                            </div>
                                            <div class="pm-item">
                                                <input type="radio" value="cod" name="payment_method" id="two">
                                                <label for="two">Cash on delievery</label>
                                            </div>
                                            <div class="pm-item">
                                                <input type="radio" value="credit_card" name="payment_method" id="three">
                                                <label for="three">Credit card</label>
                                            </div>
                                            <div class="pm-item">
                                                <input type="radio" value="bank_transfer" name="payment_method" id="four" checked>
                                                <label for="four">Direct bank transfer</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="col-md-4 col-md-offset-3">
                                            <button class="primary-btn" type="submit">Proceed to Paypal</button>
                                       </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>


@endsection