@extends('layout')



@section('content')

<section class="banner-area organic-breadcrumb">
		<div class="container">
			<div class="breadcrumb-banner d-flex flex-wrap align-items-center justify-content-end">
				<div class="col-first">
					<h1>Shop Category</h1>
					<nav class="d-flex align-items-center">
						<a href="index.html">Home<span class="lnr lnr-arrow-right"></span></a>
						<a href="#">Shop<span class="lnr lnr-arrow-right"></span></a>
						<a href="single-product.html">product-category</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<section class="lattest-product-area pb-40 category-list">
		<h1>{{$category->category_name}}</h1>
		<div class="row">
		@foreach ($category->Products()->take(9)->get() as $p)
					<!-- {{$loop->index}} -->
			<div class="col-lg-4 col-md-6">
					<div class="single-product">
						<img class="img-fluid" src="{{ asset($p->thumbnail) }}" alt="">
						<div class="product-details">
							<h6>{{ $p->product_name }}</h6>
							<div class="price">
								<h6>{{ $p->price}}</h6>
								<h6 class="l-through">$210.00</h6>
							</div>
							<div class="prd-bottom">

								<a href="" class="social-info">
									<span class="ti-bag"></span>
									<p class="hover-text">add to bag</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-heart"></span>
									<p class="hover-text">Wishlist</p>
								</a>
								<a href="" class="social-info">
									<span class="lnr lnr-sync"></span>
									<p class="hover-text">compare</p>
								</a>
								<a href="{{url("productsdetails/{$p->id}")}}"  class="social-info">
									<span class="lnr lnr-move"></span>
									<p class="hover-text">view more</p>
								</a>
							</div>
						</div>
					</div>
				</div>
				@endforeach
			</div>
		</section>
	<!--================End Single Product Area =================-->


@endsection