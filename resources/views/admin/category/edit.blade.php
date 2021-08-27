@extends('admin.admin_layouts')

@section('admin_content')
    <!-- ########## START: MAIN PANEL ########## -->
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <a class="breadcrumb-item" href="index.html">Category</a>
            <span class="breadcrumb-item active">Edit Category</span>
        </nav>

        <div class="sl-pagebody">
            <div class="sl-page-title">
                <h5>Edit Category</h5>
            </div><!-- sl-page-title -->

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error)
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Edit Category</h6>
                <form method="post" action="{{url('admin/update/categories/'.$category->id)}}">
                    @method('put')
                    @csrf
                    <div class="modal-body pd-20">
                        <div class="row">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="categoryName"> Category Name</label>
                                    <input name="name" value="{{$category->name}}" placeholder="Category" type="text" class="form-control"
                                           id="categoryName">
                                </div>
                            </div>

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label for="categoryName"> Category Status</label>
                                    <select class="form-control select2" data-placeholder="Choose Status" name="status">
                                        <option label="Choose Status"></option>
                                            <option value="0" {{$category->status === 0 ? 'selected' : '' }}>Hold</option>
                                            <option value="1" {{$category->status === 1 ? 'selected' : '' }}>Active</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div><!-- modal-body -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-info pd-x-20">Update</button>
                    </div>
                </form>
                <div class="table-wrapper">

                </div><!-- table-wrapper -->
            </div><!-- card -->
        </div><!-- sl-pagebody -->

@endsection
