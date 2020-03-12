@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">Product Manage</h2>
            <form method="get" action="{{url('admin/product/create')}}">
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Create Product
                </button>
            </form>
        </div>
    </div>
@endsection
@section("main_content")
    <div class="table-responsive table-responsive-data2">
        <table class="table table-data2">
            <thead>
            <tr>
                <th>ID</th>
                <th>product_name</th>
                <th>product_desc</th>
                <th>thumbnail</th>
                <th>gallery</th>
                <th>category_id</th>
                <th>brand_id</th>
                <th>price</th>
                <th>quantity</th>
                <th>created at</th>
                <th>updated at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($products as $c)
                <tr class="tr-shadow">
                    <td>{{$c->id}}</td>
                    <td>{{$c->product_name}}</td>
                    <td>{{$c->product_desc}}</td>
                    <td>{{$c->thumbnail}}</td>
                    <td>{{$c->gallery}}</td>
                    <td>{{$c->category_id}}</td>
                    <td>{{$c->brand_id}}</td>
                    <td>{{$c->price}}</td>
                    <td>{{$c->quantity}}</td>
                    <td>{{$c->created_at}}</td>
                    <td>{{$c->updated_at}}</td>
                    <td>
                        <div class="table-data-feature">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </div>
                    </td>
                </tr>
                <tr class="spacer"></tr>
            @empty
                <p>Không có danh mục nào</p>
            @endforelse
            </tbody>
        </table>
    </div>
@endsection