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
						<a href="single-product.html">confirmation</a>
					</nav>
				</div>
			</div>
		</div>
	</section>

	<section class="order_details section_gap">
		<div class="container">
			<h1 class="title_confirmation">Thank you. Your order has been received.</h1>
        </div>
        <div class="order_details section_gap">
            <form action="">
                <button type="submit" class="primary-btn">Xem lịch sử đơn hàng</button>
            </form>
        </div>
	</section>

    
@endsection