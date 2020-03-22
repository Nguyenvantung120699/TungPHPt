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
						<a href="single-product.html">order - history</a>
					</nav>
				</div>
			</div>
		</div>
	</section>

	<section class="order_details section_gap">
		<div class="container">
			<h1>History Order</h1>
			<div class="table-responsive">
				@foreach($newests as $u)
				<div class="row order_d_inner border">
					<div class="col-lg-4">
						<div class="details_item">
							<h4>Order Info</h4>
							<ul class="list">
								<li><a href="#"><span>Order id</span>{{$u->id}}</a></li>
								<li><a href="#"><span>customer name</span>{{$u->customer_name}}</a></li>
								<li><a href="#"><span>telephone</span>{{$u->telephone}}</a></li>
								<li><a href="#"><span>Grand Total</span>{{$u->grand_total}}</a></li>
								<li><a href="#"><span>Ngày Đặt Hàng</span>{{$u->created_at}}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="details_item">
							<h4>Shipping Address</h4>
							<ul class="list">
								<li><a href="#"><span>Shipping address</span>{{$u->shipping_address}}</a></li>
								<li><a href="#"><span>Payment method</span>{{$u->payment_method}}</a></li>
								<li><a href="#"><span>status</span>{{$u->status}}</a></li>
								<li><a href="#"><span>Ngày Giao Hàng</span>{{$u->updated_at}}</a></li>
							</ul>
						</div>
					</div>
					<div class="col-lg-4">
						<div class="details_item">
							<h4>Action</h4>
							<ul class="list">
								<li><a href="#">
									<form action="{{url("/viewOrder/{id}")}}">
										<button type="submit" class="btn btn-light btn-md btn-block">Xem chi tiết</button>
									</form>
									<form action="{{url("/checkout")}}" method="POST" novalidate="novalidate">
										<button type="submit" class="btn btn-warning btn-md btn-block">Mua lại</button>
									</form>
									<form action="{{url("/deleteOrder/{id}")}}">
										<button type="submit" class="btn btn-secondary btn-md btn-block">hủy đơn hàng</button>
									</form>
								</li>
							</ul>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</div>
	</section>

@endsection