
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
                <form action="{{url("student/students/update",['id'=>$user->id])}}" method="post">
                    @csrf
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">student name</label>
                        <input id="cc-name" name="student_name" type="text" value="{{old("student_name")}}"
                               class="form-control cc-name @if($errors->has("student_name"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("student_name"))
                            <p style="color:red">{{$errors->first("student_name")}}</p>
                        @endif
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">age</label>
                        <input id="cc-name" name="age" type="text" value="{{old("age")}}"
                               class="form-control cc-name @if($errors->has("age"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("age"))
                            <p style="color:red">{{$errors->first("age")}}</p>
                        @endif
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">telephone</label>
                        <input id="cc-name" name="telephone" type="text" value="{{old("telephone")}}"
                               class="form-control cc-name @if($errors->has("telephone"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("telephone"))
                            <p style="color:red">{{$errors->first("telephone")}}</p>
                        @endif
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">classRoom</label>
                        <input id="cc-name" name="classRoom" type="text" value="{{old("classRoom")}}"
                               class="form-control cc-name @if($errors->has("classRoom"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("classRoom"))
                            <p style="color:red">{{$errors->first("classRoom")}}</p>
                        @endif
                    </div>
                    <div class="form-group has-success">
                        <label for="cc-name" class="control-label mb-1">total_mark</label>
                        <input id="cc-name" name="total_mark" type="text" value="{{old("total_mark")}}"
                               class="form-control cc-name @if($errors->has("total_mark"))is-invalid @endif" >
                        <span class="help-block field-validation-valid"></span>
                        @if($errors->has("total_mark"))
                            <p style="color:red">{{$errors->first("total_mark")}}</p>
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
