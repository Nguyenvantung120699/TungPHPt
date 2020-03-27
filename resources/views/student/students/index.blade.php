@extends("admin.layout")
@section("top_content")
    <div class="col-md-12">
        <div class="overview-wrap">
            <h2 class="title-1">User Manage</h2>
            <form method="get" action="{{url('student/student/create')}}">
                <button class="au-btn au-btn-icon au-btn--blue">
                    <i class="zmdi zmdi-plus"></i>Create student
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
                <th>student_Name</th>
                <th>age</th>
                <th>telephone</th>
                <th>classRoom</th>
                <th>total_mark</th>
                <th>created_at</th>
                <th>updated_at</th>
                <th></th>
            </tr>
            </thead>
            <tbody>
            @forelse($student as $c)
                <tr class="tr-shadow">
                    <td>{{$c->id}}</td>
                    <td>{{$c->student_name}}</td>
                    <td>{{$c->age}}</td>
                    <td>{{$c->telephone}}</td>
                    <td>{{$c->classRoom}}</td>
                    <td>{{$c->total_mark}}</td>
                    <td>{{$c->created_at}}</td>
                    <td>{{$c->updated_at}}</td>
                    <td>
                        <div class="table-data-feature">
                        <form action="{{url("student/student/edit",['id'=>$c->id])}}">
                        <button class="item" data-toggle="tooltip" data-placement="top" title="Edit">
                                <i class="zmdi zmdi-edit"></i>
                            </button>
                        </form>
                        <form action="{{url("student/student/delete",['id'=>$c->id])}}">
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