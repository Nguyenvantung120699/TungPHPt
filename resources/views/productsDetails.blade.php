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
						<a href="single-product.html">product-details</a>
					</nav>
				</div>
			</div>
		</div>
	</section>
	<!-- End Banner Area -->

	<!--================Single Product Area =================-->
	<div class="product_image_area" style="padding-bottom:10%;">
		<div class="container">
			<div class="row s_product_inner">
			<div class="col-lg-7">
                    <figure>
                        <div class="col-md-12">
							<img style="width:100%;" class="product-big-img" src="{{asset($product->thumbnail)}}" alt="">
						</div>
                    </figure>
                    @php
                        $gallery = $product->gallery;
                        $gallery = explode(",",$gallery);// string -> array
                    @endphp
                    <div class="product-thumbs row col-md-12">
                        <div class="product-thumbs-track row col-md-12">
                            @foreach($gallery as $g)
								<div class="pt col-md-12" data-imgbigurl="{{asset($g)}}">
									<img style="width:113%;margin-bottom:4%;" src="{{asset($g)}}" alt="">
								</div>
                            @endforeach
                        </div>
                    </div>
                </div>
				<div class="col-lg-5">
					<div class="s_product_text">
						<h3>{{$product->product_name}}</h3>
						<h2>{{$product->price}}</h2>
						<ul class="list">
							<li>Danh mục: {{$product->Category->category_name}}</li>
							<li>Thương hiệu: {{$product->Brand->brand_name}}</li>

							<p>{{$product->product_desc}}</p>

							<li><p>Số Lượng: {{$product->quantity}}</p></li>
							<li>
								<div class="product_count">
									<label for="qty">Quantity:</label>
									<input type="text" name="qty" id="sst" maxlength="12" value="1" title="Quantity:" class="input-text qty">
									<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst )) result.value++;return false;"
									class="increase items-count" type="button"><i class="lnr lnr-chevron-up"></i></button>
									<button onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
									class="reduced items-count" type="button"><i class="lnr lnr-chevron-down"></i></button>
								</div>
							</li>
						</ul>
						<!-- <p>{{$product->product_desc}}</p> -->
					
						<div class="card_area d-flex align-items-center">
							<a class="primary-btn" href="{{url("shopping/{$product->id}")}}">Add to Cart</a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-diamond"></i></a>
							<a class="icon_btn" href="#"><i class="lnr lnr lnr-heart"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--================End Single Product Area =================-->


@endsection