@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Course</span>
        </nav>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">New Course Add
                    <a href="{{route('courses')}}" class="btn btn-sm btn-success pull-right"> All Course</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">New Course Add From</p>

                <form method="post" action="{{route('store.course')}}" enctype="multipart/form-data">
                    @csrf
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Course Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name"
                                           placeholder="Enter Course Name">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Level: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Level"
                                            name="level">
                                        <option label="Choose Level"></option>
                                        <option value="beginner">Beginner</option>
                                        <option value="immediate">Immediate</option>
                                        <option value="high">High</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Hours: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="hours"
                                           placeholder="Enter Course hours">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group">
                                    <label class="form-control-label">Rating: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="rating"
                                           placeholder="Enter Rating">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category"
                                            name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}">{{$category->name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-4">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Views: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="views"
                                           placeholder="Enter Views">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course Description: <span
                                            class="tx-danger">*</span></label>
                                    <textarea id="summernote" class="form-control" name="description"
                                              placeholder="Enter Course description"></textarea>
                                </div>
                            </div><!-- col-12 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course Image: <span
                                            class="tx-danger">*</span></label>

                                    <input type="file" name="image" class="form-control">
                                </div>
                            </div>
                        </div><!-- row -->

                        <br>
                        <br>

                        <div class="form-layout-footer">
                            <button class="btn btn-info mg-r-5">Submit Form</button>
                            <button class="btn btn-secondary">Cancel</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->
        </div>

        <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

@endsection
