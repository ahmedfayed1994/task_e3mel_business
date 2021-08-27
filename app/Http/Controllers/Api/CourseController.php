<?php

namespace App\Http\Controllers\Api;

use App\Course;
use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;

class CourseController extends Controller
{
    /**
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        $courses = Course::where('status', 1)->paginate();
        return response()->json(['data'=> $courses]);
    }
}
