@extends('layout')


@section('content')
<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Product Details Page</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">viewOrder</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <section class="order_details section_gap">
		<div class="container">
			<div class="row order_d_inner">
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Order Info</h4>
						<ul class="list">
							<li><a href="#"><span>customer name</span>{{$order->customer_name}}</a></li>
							<li><a href="#"><span>telephone</span>{{$order->telephone}}</a></li>
                            <li><a href="#"><span>Grand Total</span>{{$order->grand_total}}</a></li>
                            <li><a href="#"><span>Date Created</span>{{$order->created_at}}</a></li>
						</ul>
					</div>
				</div>
				<div class="col-lg-4">
					<div class="details_item">
						<h4>Shipping Address</h4>
						<ul class="list">
							<li><a href="#"><span>Shipping address</span>{{$order->shipping_address}}</a></li>
							<li><a href="#"><span>Payment method</span>{{$order->payment_method}}</a></li>
                            <li><a href="#"><span>status</span>{{$order->status}}</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>
@endsection