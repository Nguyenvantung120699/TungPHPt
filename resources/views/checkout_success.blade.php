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
						<a href="single-product.html">checkout success</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
    <div class="container">
        <div class="col-md-13">
            <h1>ORDER COMPLETE</h1>
            <form action="{{url("/")}}">
                <div class="col-md-12">
                    <button class="primary-btn" type="submit">
                        Tiếp Tục Mua Hàng
                    </button>
                </div>
            </form>
        </div>
    </div>
@endsection