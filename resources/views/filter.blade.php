
<div class="d-md-flex align-items-md-center col-12">
    <div style="font-weight: bold" class="h4">Display {{$count}} total results for "Tasweeq"</div>
</div>
<div class="clearfix"></div>
@foreach($courses as $course)
    <div class="col-lg-4 col-md-6 col-sm-10 offset-md-0 offset-sm-1 pt-md-0 pt-4">
        <div class="card">
            <h4 class="marketing">Marketing</h4>
            <img class="card-img-top"
                 src="https://392821-1236213-1-raikfcquaxqncofqfm.stackpathdns.com/wp-content/uploads/2020/06/Marketing.png">
            <div class="card-body">
                <h6 style="color: #48b83e; font-size: 13px" class="font-weight-bold pt-1">
                    {{$course->name}}</h6>
                <div class="user">
                    <i class="fa fa-user"></i>
                    <h6>ahmed Fayed</h6>
                </div>
                <div class="text-muted description">{!!$course->description!!}</div>
                <div class="d-flex align-items-center course"><span class="fas fa-star"></span>
                    <span class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                        class="fas fa-star"></span> <span class="far fa-star"></span></div>
            </div>
        </div>
    </div>
@endforeach
