<!DOCTYPE html>

<html lang="zxx">

@include('html.head')
<body>

	<!-- Start Header Area -->
@include('html.header')
<!-- Header section end -->

<!-- Product section -->

<section class="product-section spad">

    <div class="container">

        @yield('content')

    </div>

</section>

<!-- Product section end -->







<!-- Footer top section -->
@include('html.footer')

<!-- Footer section end -->



</body>

</html>