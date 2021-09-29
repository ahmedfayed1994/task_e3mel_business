<?php

namespace App\Http\Controllers;

use App\Course;
use App\Category;
use App\Http\Requests\CourseRequest;
use App\Image;
use App\Mail\CourseMarkedown;
use App\Mail\NewCourse;
use Exception;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\View\View;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|Response|View
     */
    public function index()
    {
        $courses = Course::with('category', 'image')->get();
        return view('admin.course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Application|Factory|Response|View
     */
    public function create()
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.course.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function store(CourseRequest $request)
    {

        $course = new Course();
        $course->category_id = $request->category_id;
        $course->name = $request->name;
        $course->level = $request->level;
        $course->views = $request->views;
        $course->rating = $request->rating;
        $course->hours = $request->hours;
        $course->status = 1;
        $course->description = $request->description;

        $course->save();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');
            $course->image()->save(
                Image::make([
                    'path' => $path,
                    'imageable_type' => $path,
                    'imageable_id' => $course->id,
                ])
            );
        }

        Mail::to("ahmedfayed1000@gmail.com")->send(
            new CourseMarkedown($course)
        );

        $response = array(
            'message' => 'Course Added Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($response);
    }

    /**
     * Display the specified resource.
     *
     * @param Course $course
     * @return void
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param Course $course
     * @return Application|Factory|Response|View
     */
    public function edit(Course $course)
    {
        $categories = Category::where('status', 1)->get();
        return view('admin.course.edit', compact('course', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param Request $request
     * @param Course $course
     * @return RedirectResponse
     */
    public function update(CourseRequest $request, Course $course): RedirectResponse
    {
        $course->first();

        if ($request->hasFile('image')) {
            $path = $request->file('image')->store('images');

            if ($course->image) {
                Storage::delete($course->image->path);
                $course->image->path = $path;
                $course->image->save();
            }else{
                $course->image()->save(
                    Image::make([
                        'path' => $path,
                    ])
                );
            }

        }

        $course->category_id = $request->category_id;
        $course->name = $request->name;
        $course->level = $request->level;
        $course->views = $request->views;
        $course->rating = $request->rating;
        $course->hours = $request->hours;
        $course->description = $request->description;

        $course->save();


        $response = array(
            'message' => 'Course Update Successfully',
            'alert-type' => 'success'
        );
        return redirect()->route('courses')->with($response);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Course $course
     * @return RedirectResponse
     * @throws Exception
     */
    public function delete(Course $course): RedirectResponse
    {
        $course->delete();
        $response = array(
            'message' => 'Course Deleted Successfully',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($response);
    }

    /**
     * @param Course $course
     * @return RedirectResponse
     */
    public function inactive(Course $course): RedirectResponse
    {
        $course->update(['status' => 0]);
        $response = array(
            'message' => 'Course Successfully inactive',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($response);
    }

    /**
     * @param Course $course
     * @return RedirectResponse
     */
    public function active(Course $course): RedirectResponse
    {
        $course->update(['status' => 1]);
        $response = array(
            'message' => 'Course Successfully active',
            'alert-type' => 'success'
        );
        return redirect()->back()->with($response);
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function search(Request $request)
    {
        $courses = Course::query()
            ->where('status', '!=', 0)
            ->where('name', 'like', '%' . $request->data['text'] . '%')
            ->orWhere('description', 'like', '%' . $request->data['text'] . '%')
            ->get();
        $count = count($courses);

        return view('filter', compact('courses', 'count'));
    }

    /**
     * @param Request $request
     * @return Application|Factory|View
     */
    public function filter(Request $request)
    {
        $cat = $request->data['cat'] ?? null;
        $rate = $request->data['rate'] ?? null;
        $level = $request->data['level'] ?? null;
        $time = $request->data['time'] ?? null;
        $courses = Course::query()
            ->where('status', '!=', 0)
            ->when($cat, function ($query) use ($cat) {
                $query->where('category_id', $cat);
            })
            ->when($rate, function ($query) use ($rate) {
                $query->where('rating', $rate);
            })
            ->when($level, function ($query) use ($level) {
                $query->whereIn('level', $level);
            })
            ->when($level, function ($query) use ($level) {
                $query->whereIn('level', $level);
            })
            ->when($time, function ($query) use ($time) {
                if ($time == 9) {
                    $query->where('hours', '>=', 8);
                } else {
                    $query->where('hours', '<=', $time);
                }

            })
            ->get();
        $count = count($courses);
        return view('filter', compact('courses', 'count'));
    }
}
