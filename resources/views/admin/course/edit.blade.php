@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">Edit Course ({{$course->name}})</span>
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
                <h6 class="card-body-title">Update Course ({{$course->name}})
                    <a href="{{route('courses')}}" class="btn btn-sm btn-success pull-right"> All Course</a>
                </h6>
                <p class="mg-b-20 mg-sm-b-30">Update Course From</p>

                <form method="post" action="{{url('admin/update/courses/'.$course->id)}}" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-layout">
                        <div class="row mg-b-25">
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Course Name: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="name"
                                           value="{{$course->name}}">
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Course Level: <span
                                            class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Level"
                                            name="level">
                                        <option label="Choose Level"></option>
                                        <option @if($course->level == 'beginner') selected @endif value="beginner">
                                            Beginner
                                        </option>
                                        <option @if($course->level == 'immediate') selected @endif value="immediate">
                                            Immediate
                                        </option>
                                        <option @if($course->level == 'high') selected @endif value="high">High</option>
                                    </select>
                                </div>
                            </div><!-- col-4 -->
                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Hours: <span class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="hours"
                                           value="{{$course->hours}}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group">
                                    <label class="form-control-label">Rating: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="rating"
                                           value="{{$course->rating}}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                    <select class="form-control select2" data-placeholder="Choose Category"
                                            name="category_id">
                                        <option label="Choose Category"></option>
                                        @foreach($categories as $category)
                                            <option value="{{$category->id}}"
                                                    @if($category->id == $course->category_id) selected @endif>
                                                {{$category->name}}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-6">
                                <div class="form-group mg-b-10-force">
                                    <label class="form-control-label">Views: <span
                                            class="tx-danger">*</span></label>
                                    <input class="form-control" type="text" name="views"
                                           value="{{$course->views}}">
                                </div>
                            </div><!-- col-4 -->

                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label class="form-control-label">Course Description: <span
                                            class="tx-danger">*</span></label>
                                    <textarea id="summernote" class="form-control"
                                              name="description">{{$course->description}}</textarea>
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
                            <button class="btn btn-info mg-r-5">Update Course</button>
                        </div><!-- form-layout-footer -->
                    </div><!-- form-layout -->
                </form>
            </div><!-- card -->
        </div>

    </div>

    <script src="https://cdn.jsdelivr.net/bootstrap.tagsinput/0.8.0/bootstrap-tagsinput.min.js"></script>

@endsection
