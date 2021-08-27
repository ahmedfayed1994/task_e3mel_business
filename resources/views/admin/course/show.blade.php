@extends('admin.admin_layouts')

@section('admin_content')
    <div class="sl-mainpanel">
        <nav class="breadcrumb sl-breadcrumb">
            <a class="breadcrumb-item" href="index.html">Starlight</a>
            <span class="breadcrumb-item active">{{$product->product_name}}</span>
        </nav>

        <div class="sl-pagebody">
            <div class="card pd-20 pd-sm-40">
                <h6 class="card-body-title">Product Details Page</h6>
                <div class="form-layout">
                    <div class="row mg-b-25">
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Name: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->product_name}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Code: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->product_code}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Quantity: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->product_quantity}}</strong>
                            </div>
                        </div><!-- col-4 -->
                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Category: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->category->category_name}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Sub Category: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->subcategory->subcategory_name}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group mg-b-10-force">
                                <label class="form-control-label">Brand: <span class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->brand->brand_name}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Size: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->product_size}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Product Color: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->product_color}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Selling Price: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong>{{$product->selling_price}}</strong>
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Product Details: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <p>{!! $product->product_details !!}</p>
                            </div>
                        </div><!-- col-12 -->

                        <div class="col-lg-12">
                            <div class="form-group">
                                <label class="form-control-label">Video Link: <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <strong><a href="{{$product->video_link}}">{{$product->video_link}}</a></strong>
                            </div>
                        </div><!-- col-12 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image One (Main Thumbnail): <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <img style="height: 80px; width: 80px"
                                     src="{{\Illuminate\Support\Facades\URL::to($product->image_one)}}" id="one">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Two (Main Thumbnail): <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <img style="height: 80px; width: 80px"
                                     src="{{\Illuminate\Support\Facades\URL::to($product->image_two)}}" id="one">
                            </div>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <div class="form-group">
                                <label class="form-control-label">Image Three (Main Thumbnail): <span
                                        class="tx-danger">*</span></label>
                                <br>
                                <img style="height: 80px; width: 80px"
                                     src="{{\Illuminate\Support\Facades\URL::to($product->image_three)}}" id="one">
                            </div>
                        </div><!-- col-4 -->
                    </div><!-- row -->

                    <br><br>
                    <hr>
                    <br>
                    <div class="row">
                        <div class="col-lg-4">
                            <label>
                                @if($product->main_slider == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                <span>Main Slider</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label>
                                @if($product->hot_deal == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                <span>Hot Deal</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label>
                                @if($product->best_rated == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                <span>Best Rated</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label>
                                @if($product->trend == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                <span>Trend Product</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label>
                                @if($product->mid_slider == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                <span>Mid Slider</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label>
                                @if($product->hot_new == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                <span>Hot New</span>
                            </label>
                        </div><!-- col-4 -->

                        <div class="col-lg-4">
                            <label>
                                @if($product->buyone_getone == 1)
                                    <span class="badge badge-success">Active</span>
                                @else
                                    <span class="badge badge-danger">InActive</span>
                                @endif
                                    <span>Buy One Get One</span>
                            </label>
                        </div><!-- col-4 -->


                    </div><!-- row -->
                </div><!-- form-layout -->
            </div><!-- card -->
        </div>

@endsection
