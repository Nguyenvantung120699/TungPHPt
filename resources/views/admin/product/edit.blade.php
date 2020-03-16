
@extends("admin.layout")
@section("top_content")
<div class="col-md-12 col-md-offset-3">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Thêm sản phẩm</h2>
        </div>
    </div>
   <div class="col-md-6">
        <form method="post" action="{{url("admin/product/update",['id'=>$products->id])}}">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput1">Name</label>
                <input type="text" class="form-control cc-name" id="cc-name" name="product_name" value="{{old("product_name")}}" placeholder="Name Product">
                <!-- @if($errors->has("product_name"))
                    <p style="color:red">{{$errors->first("product_name")}}</p>
                 @endif -->
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput2">Desc</label>
                <input type="text" class="form-control cc-name" id="cc-name" name="product_desc" value="{{old("product_desc")}}" placeholder="Desc">
                <!-- @if($errors->has("product_desc"))
                    <p style="color:red">{{$errors->first("product_desc")}}</p>
                 @endif -->
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput3">Thumbnail</label>
                <input type="text" class="form-control cc-name @if($errors->has("thumbnail"))is-invalid @endif" id="cc-name" name="thumbnail" value="{{old("thumbnail")}}" placeholder="thumbnail">
                @if($errors->has("thumbnail"))
                    <p style="color:red">{{$errors->first("thumbnail")}}</p>
                 @endif
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput4">Gallery</label>
                <input type="text" class="form-control cc-name @if($errors->has("gallery"))is-invalid @endif" id="cc-name" name="gallery" value="{{old("gallery")}}" placeholder="gallery">
                @if($errors->has("gallery"))
                    <p style="color:red">{{$errors->first("gallery")}}</p>
                 @endif
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput5">Category_id</label>
                <input type="text" class="form-control cc-name" id="cc-name" name="category_id" value="{{old("category_id")}}" placeholder="Category Id">
                <!-- @if($errors->has("category_id"))
                    <p style="color:red">{{$errors->first("category_id")}}</p>
                 @endif -->
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput6">Brand_id</label>
                <input type="text" class="form-control cc-name" id="cc-name" name="brand_id" value="{{old("brand_id")}}" placeholder="Brand id">
                <!-- @if($errors->has("brand_id"))
                    <p style="color:red">{{$errors->first("brand_id")}}</p>
                 @endif -->
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput7">Price</label>
                <input type="text" class="form-control cc-name " id="cc-name" name="price" value="{{old("price")}}" placeholder="price">
                <!-- @if($errors->has("price"))
                    <p style="color:red">{{$errors->first("price")}}</p>
                 @endif -->
            </div>
            <div class="form-group">
                <label for="formGroupExampleInput8">Quantity</label>
                <input type="text" class="form-control cc-name " id="cc-name" name="quantity" value="{{old("quantity")}}" placeholder="Quantity">
                <!-- @if($errors->has("quantity"))
                    <p style="color:red">{{$errors->first("quantity")}}</p>
                 @endif -->
            </div>
            <div>
                <button class="btn btn-danger" type="submit">
                <i class="fa fa-lock fa-lg"></i>
                <span id="payment-button-amount">Gửi Đi</span>
                </button>
            </div>
        </form>
    </div>
   </div>
@endsection
@section('main_content')
