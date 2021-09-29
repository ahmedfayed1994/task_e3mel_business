<style>
    body {
        font-family: Arial, Helvetica, sans-serif;
    }
</style>

<img src="{{asset('storage/'.$course->image->path)}}" alt="">
<p>Hi {{\Illuminate\Support\Facades\Auth::user()->name }} </p>

<p>
    New course create in your site
    <a href="#">{{$course->name}} </a>
</p>


<hr>

<p>
    <a href="">ahmed</a>
</p>
