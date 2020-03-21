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
						<a href="single-product.html">order-2 history</a>
					</nav>
				</div>
			</div>
		</div>
	</section>

	<section class="order_details section_gap">
		<div class="container">
        <form action="{{url("/")}}">
            <button class="primary-btn" type="submit">Karma shop</button>
        </form>
			<div class="order_details_table">
				<h2>Order History</h2>
				<div class="table-responsive">
					<table class="table">
						<thead>
							<tr>
								<th scope="col">user id</th>
								<th scope="col">customer name</th>
                                <th scope="col">shipping address</th>
								<th scope="col">telephone</th>
								<th scope="col">Total</th>
                                <th scope="col">payment method</th>
								<th scope="col">status</th>
								<th scope="col">create_at</th>
							</tr>
						</thead>
						<tbody>
                            @foreach($newests as $u)
							<tr>
								<td>
									<p>{{$u->user_id}}</p>
								</td>
								<td>
									<p>{{$u->customer_name}}</p>
								</td>
                                <td>
									<p>{{$u->shipping_address}}</p>
								</td>
                                <td>
									<p>{{$u->telephone}}</p>
								</td>
                                <td>
									<p>{{$u->grand_total}}</p>
								</td>
                                <td>
									<p>{{$u->payment_method}}</p>
								</td>
                                <td>
									<p>{{$u->status}}</p>
								</td>
                                <td>
									<p>{{$u->created_at}}</p>
								</td>
                                <td>
                                    <div class="btn-group btn-group-toggle" data-toggle="buttons">
                                        <label class="btn btn-light">
                                            <input type="radio" name="options" id="option1" autocomplete="off" checked> xem
                                        </label>
                                        <label class="btn btn-warning">
                                            <input type="radio" name="options" id="option2" autocomplete="off"> mua lại
                                        </label>
                                    </div>
                                </td>
							</tr>
                            @endforeach
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</section>
@endsection