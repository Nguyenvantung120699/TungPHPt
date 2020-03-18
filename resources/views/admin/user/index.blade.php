@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">User Manage</h2>
            <form method="get" action="{{url('admin/user/create')}}">
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Create User
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
                <th>User_Name</th>
                <th>Email</th>
                <th>Email_verifiled_at</th>
                <th>Password</th>
                <th>Role</th>
                <th>Remember_Token</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($user as $c)
                <tr class="tr-shadow">
                    <td>{{$c->id}}</td>
                    <td>{{$c->name}}</td>
                    <td>{{$c->email}}</td>
                    <td>{{$c->email_verifiled_at}}</td>
                    <td>{{$c->password}}</td>
                    <td>{{$c->role}}</td>
                    <td>{{$c->remember_token}}</td>
                    <td>
                        <div class="table-data-feature">
                        <form action="{{url("admin/user/edit",['id'=>$c->id])}}">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        </form>
                        <form action="{{url("admin/user/delete",['id'=>$c->id])}}">
                            <button class="item" data-toggle="tooltip" data-placement="top" title="Delete">
                                <i class="zmdi zmdi-delete"></i>
                            </button>
                        </form>
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