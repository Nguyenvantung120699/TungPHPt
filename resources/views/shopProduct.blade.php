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
						<a href="single-product.html">shop product</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<section class="section_gap">
		<!-- single product slide -->
		<div class="single-product">
			<div class="container">
				<div class="text-center">
					<h3>Sản Phẩm Mới Nhất</h3>
				</div>
				<div class="row">
					@foreach($newests as $p)
							<!-- {{$loop->index}} -->
					<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="{{ $p->thumbnail}}" alt="">
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
										<a href="{{url("shop/{$p->category_id}")}}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">category more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>
					<div class="text-center">
						<h3>Sản Phẩm Giá Rẻ</h3>
					</div>
					<div class="row">
					@foreach($cheaps as $p)
							<!-- {{$loop->index}} -->
					<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="{{ $p->thumbnail}}" alt="">
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
										<a href="{{url("shop/{$p->category_id}")}}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">category more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>

					<div class="text-center">
						<h3>Sản Phẩm Giá Cao</h3>
					</div>
					<div class="row">
					@foreach($exs as $p)
							<!-- {{$loop->index}} -->
					<div class="col-lg-3 col-md-6">
							<div class="single-product">
								<img class="img-fluid" src="{{ $p->thumbnail}}" alt="">
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
										<a href="{{url("shop/{$p->category_id}")}}" class="social-info">
											<span class="lnr lnr-move"></span>
											<p class="hover-text">category more</p>
										</a>
									</div>
								</div>
							</div>
						</div>
						@endforeach
					</div>

			</div>
		</div>
	</section>


@endsection