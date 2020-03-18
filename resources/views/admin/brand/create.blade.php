
@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Sửa danh mục sản phẩm</h2>
        </div>
    </div>
@endsection
@section('main_content')
    <div class="col-lg-6">
        <div class="card">
            <div class="card-header">Sửa danh mục</div>
            <div class="card-body">
                <form  action="{{url("admin/brand/store")}}" method="post">
                    @csrf
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">brand name</label>
                        <input id="cc-name" name="brand_name" type="text" value="{{old("brand_name")}}"
                               class="form-control cc-name @if($errors->has("brand_name"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("brand_name"))
                            <p style="color:red">{{$errors->first("brand_name")}}</p>
                        @endif
                    </div>
                    <div>
                        <button id="payment-button" type="submit" class="btn btn-lg btn-info btn-block">
                            <i class="fa fa-lock fa-lg"></i>&nbsp;
                            <span id="payment-button-amount">Gửi đi</span>
                            <span id="payment-button-sending" style="display:none;">Sending…</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection