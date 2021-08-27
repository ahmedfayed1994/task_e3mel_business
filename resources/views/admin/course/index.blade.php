@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Product</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Course Table</h5>
            </div><!-- sl-page-title -->

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Course List
                    <a href="{{route('add.course')}}" class="btn btn-sm btn-warning" style="float: right">Add New</a>

                </h6>

                <div class="table-wrapper">
                    <table id="datatable1" class="table display responsive nowrap">
                        <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Category</th>
                            <th>Description</th>
                            <th>Rating</th>
                            <th>Level</th>
                            <th>Views</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach($courses as $key=>$course)
                            <tr>
                                <td>{{$key+1}}</td>
                                <td>{{$course->name}}</td>
                                <td>{{$course->category->name ?? " "}}</td>
                                <td>{!! $course->description !!}</td>
                                <td>{{$course->rating}}</td>
                                <td>{{$course->level}}</td>
                                <td>{{$course->views}}</td>
                                <td>
                                    @if($course->status == 1)
                                        <span class="badge badge-success">Active</span>
                                    @else
                                        <span class="badge badge-danger">UnActive</span>
                                    @endif
                                </td>
                                <td>
                                    <a href="{{route('edit.course', $course->id)}}" class="btn btn-sm btn-warning"><i class="fa fa-edit"></i></a>
                                    <a href="{{route('delete.course', $course->id)}}" class="btn btn-sm btn-danger" id="delete"><i class="fa fa-trash"></i></a>


                                    @if($course->status == 1)
                                        <a href="{{\Illuminate\Support\Facades\URL::to('admin/inactive/course/'.$course->id)}}" class="btn btn-sm btn-danger"><i class="fa fa-thumbs-down"></i></a>
                                    @else
                                        <a href="{{\Illuminate\Support\Facades\URL::to('admin/active/course/'.$course->id)}}" class="btn btn-sm btn-success"><i class="fa fa-thumbs-up"></i></a>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

@endsection
