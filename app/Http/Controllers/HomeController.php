<?php

namespace App\Http\Controllers;

use App\Category;
use App\Course;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

class HomeController extends Controller
{

    /**
     * @return Application|Factory|View
     */
    public function index()
    {
        $courses = Course::with('image')->where('status', 1)->paginate(15);
        $categories = Category::withCount('course')->where('status', 1)->get();
        return view('welcome', compact('courses', 'categories'));
    }

    /**
     *
     * @return RedirectResponse
     */
    public function Logout(): RedirectResponse
    {
       Auth::logout();
        $response = array(
            'message' => 'Successfully Logout',
            'alert-type' => 'success'
        );
        return redirect()->route('login')->with($response);
    }

}
