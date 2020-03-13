
@extends("admin.layout")
@section("top_content")
<div class="col-md-12 col-md-offset-3">
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Thêm thương hiệu sản phẩm</h2>
        </div>
    </div>
   <div class="col-md-6">
        <form method="post" action="{{url("admin/brand/store")}}">
            @csrf
            <div class="form-group">
                <label for="formGroupExampleInput2">Name</label>
                <input type="text" class="form-control cc-name @if($errors->has("brand_name"))is-invalid @endif" id="cc-name" name="brand_name" value="{{old("brand_name")}}" placeholder="Name Brand">
                @if($errors->has("brand_name"))
                    <p style="color:red">{{$errors->first("brand_name")}}</p>
                 @endif
            </div>
            <?php 
                echo $str;
            ?>
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

@endsection