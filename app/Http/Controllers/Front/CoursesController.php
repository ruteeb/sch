<?php

namespace App\Http\Controllers\Front;

use App\Model\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CoursesController extends Controller
{


    /**
     * get all courses activation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all active courses
        $courses = Courses::orderBy('id', 'DESC')->where('active', 1)->paginate(9);
        return view('front.courses', ['courses' => $courses]);
    }


    /**
     * View Data Course
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data course by id
        $course = Courses::find($id);

        if(!$course)
            abort(404);

        return view('front.course-details', ['course' => $course]);
    }

}
