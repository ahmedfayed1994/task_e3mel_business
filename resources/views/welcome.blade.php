<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@200;600&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet">

    <link href="{{asset("front/css/style.css")}}" rel="stylesheet">

    <link href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" rel="stylesheet">

    <!-- Js -->
    <script src="{{asset("backend/lib/jquery/jquery.js")}}"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

</head>
<body>
<div class="wrapper">
    <div class="container">

        <div class="row nav">
            <div class="col-sm-2">
                <h1 style="margin:0px;"><span class="largenav">Logo</span></h1>
            </div>
            <div class="flipkart-navbar-search col-lg-6 smallsearch col-sm-12 col-xs-5">
                <form action="{{route('search')}}">
                    @csrf
                    <input class="flipkart-navbar-input col-xs-11 col-lg-10 col-sm-11 search" type="text"
                           placeholder="Search for courses, Brands and more" name="search">
                    <button class="flipkart-navbar-button col-xs-1 click-search">
                        <i class="fa fa-search"></i>
                    </button>
                </form>
            </div>
            <div class="col-sm-9 col-lg-2">
                <a style="font-size: 12px; font-weight: 700; line-height: 4">
                    Join As instructor | Login
                </a>
            </div>
            <div class="col-sm-3 col-lg-2">
                <a class="sign-up-button">
                    Sign Up
                </a>
            </div>
        </div>
        <hr>

        <div class="d-md-flex align-items-md-center">
            <ul class="menu_art">
                <li>Courses(<span>10</span>)</li>
                <li>Diplomas(<span>13</span>)</li>
                <li>Article(<span>40</span>)</li>
            </ul>
        </div>

        <hr style="margin-top: -13px">

        <div class="content py-md-0 py-3">
            <section id="sidebar">
                <div class="py-3">
                    <h5 class="head_filter">Categories</h5>
                    @foreach($categories as $category)
                        <div class="form-check">
                            <input style="display: none" name="category" onclick="filter()" value="{{$category->id}}"
                                   id="{{$category->name}}" type="radio"
                                   class=" category">

                            <label for="{{$category->name}}">{{$category->name}}</label>
                        </div>
                    @endforeach
                </div>

                <div class="py-3">
                    <h5 class="head_filter">Courses Rating</h5>
                    <form class="rating">
                        <div class="form-inline d-flex align-items-center py-2"><label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <input onclick="filter()" class="rate" name="rate"
                                                                       value="5" type="radio"> <span
                                    class="check radio"></span>
                            </label></div>
                        <div class="form-inline d-flex align-items-center py-2"><label class="tick"> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <input onclick="filter()" class="rate"
                                                                                       name="rate" value="4"
                                                                                       type="radio"> <span
                                    class="check radio"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-2"><label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span>
                                <span
                                    class="far fa-star px-1 text-muted"></span> <input onclick="filter()" class="rate"
                                                                                       name="rate" value="3"
                                                                                       type="radio"> <span
                                    class="check radio"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-2"><label class="tick"><span
                                    class="fas fa-star"></span> <span class="fas fa-star"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <input onclick="filter()" class="rate"
                                                                                       name="rate"
                                                                                       value="2" type="radio"> <span
                                    class="check radio"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-2"><label class="tick"> <span
                                    class="fas fa-star"></span> <span class="far fa-star px-1 text-muted"></span>
                                <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <span
                                    class="far fa-star px-1 text-muted"></span> <input class="rate" onclick="filter()"
                                                                                       name="rate"
                                                                                       value="1" type="radio"> <span
                                    class="check radio"></span> </label></div>
                    </form>
                </div>

                <div class="py-3">
                    <h5 class="head_filter">Level</h5>
                    <form class="levels">
                        <div class="form-inline d-flex align-items-center py-1"><label class="tick">Beginner<input
                                    type="checkbox" onclick="filter()" class="level" value="beginner"> <span
                                    class="check"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-1"><label class="tick">Immediate <input
                                    type="checkbox" class="level" onclick="filter()" value="immediate"> <span
                                    class="check"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-1"><label class="tick">High <input
                                    type="checkbox" class="level" onclick="filter()" value="high"> <span
                                    class="check"></span> </label></div>
                    </form>
                </div>

                <div class="py-3">
                    <h5 class="head_filter">Time</h5>
                    <form class="times">
                        <div class="form-inline d-flex align-items-center py-1"><label class="tick">Less Then 4
                                hrs<input class="time" name="time" onclick="filter()" type="radio" value="4"> <span
                                    class="check"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-1"><label class="tick">Less Than 8
                                hrs<input class="time" name="time" onclick="filter()" type="radio" value="8"> <span
                                    class="check"></span> </label></div>
                        <div class="form-inline d-flex align-items-center py-1"><label class="tick">More Than 8 hrs
                                <input class="time" name="time" onclick="filter()" type="radio" value="9"> <span
                                    class="check"></span> </label></div>
                    </form>
                </div>

            </section> <!-- courses Section -->

            <section id="courses">
                <div class="container py-3">
                    <div class="row course">
                        <div class="col-12" style="padding: 0 18px 14px; font-weight: 600; color: #08206b;">All
                            Courses<span style="font-weight: 400; color: #aaa8a8; font-size: 10px;"> ( {{count($courses)}} Courses )</span>
                        </div>
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

                                        <div class="d-flex align-items-center course">
                                            @for($i = 0; $i < $course->rating; $i++)
                                                <span class="fas fa-star"></span>
                                            @endfor

                                            @for($i = 5; $i > $course->rating; $i--)
                                                    <span class="far fa-star"></span>
                                            @endfor

                                            <span style="font-size: 13px; color: #b0afaf; margin-left: 2px">(1200)</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </section>
        </div>

    </div>

    <div class="clearfix"></div>
</div>

<div class="footer">
    <div class="container">
        <div class="row">
            <!--Footer About-->
            <div class="col-5 about">
                <h3>About the Academy</h3>
                <p>ext messages are used for personal, family, business and social purposes. Governmental and
                    non-governmental organizations use text messaging
                    for communication between colleagues.</p>
            </div>

            <div class="col-4 terms">
                <ul>
                    <li><a href="#">Terms & Condition</a></li>
                    <li><a href="#">Join As instructor</a></li>
                    <li><a href="#">Clients Talks</a></li>
                    <li><a href="#">Call Us</a></li>
                    <li><a href="#">Language:En</a></li>
                </ul>
            </div>

            <div class="col-3 payment">
                <h3>Pay with</h3>
                <img src="https://logos-world.net/wp-content/uploads/2020/04/Visa-Logo-2006-2014.png" alt="">
                <img
                    src="https://upload.wikimedia.org/wikipedia/commons/thumb/f/fb/Mada_Logo.svg/2560px-Mada_Logo.svg.png"
                    alt="">
            </div>

            <!--Contact Us-->

            <!--Footer Link-->

        </div>
    </div>
</div>

</body>
</html>


<script type="text/javascript">

    $('.click-search').click(function (e) {
        e.preventDefault();
        var data = {
            'text': $('.search').val()

        }

        $.ajax({
            url: "<?php echo(url('/search')); ?>/",
            type: 'get',
            dataType: "html",
            data: {data: data},
            success: function (data) {
                $('.course').html(data)
            }
            // This is the important part!

        })
    });


    function filter() {

        var category = $('.category:checked').val();
        var rete = $('.rate:checked').val();
        var time = $('.time:checked').val();

        var level = {};
        $('.level:checked').each(function () {
            level[$(this).val()] = $(this).val();
        });

        var data = {
            'cat': category,
            'rate': rete,
            'level': level,
            'time': time,
        }

        $.ajax({
            url: "<?php echo(url('/filter')); ?>/",
            type: 'get',
            dataType: "html",
            data: {data: data},
            success: function (data) {
                $('.course').html(data)
            }
            // This is the important part!

        })
    }

</script>
