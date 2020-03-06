@extends('layout')

@section('content')
			@foreach(\App\Category::all() as $c )
			<ul>
				<li class="nav-item"><a class="nav-link" href="{{url("{$c->id}")}}">{{$c->category_name}}</a></li>
			</ul>
			@endforeach
				<!-- End Filter Bar -->
			<section class="lattest-product-area pb-40 category-list">
				<div class="row">
					@foreach($products as $p)
							<!-- {{$loop->index}} -->
					<div class="col-lg-4 col-md-6">
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
										<a href="" class="social-info">
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
@endsection