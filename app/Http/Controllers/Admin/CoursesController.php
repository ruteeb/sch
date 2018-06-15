<?php

namespace App\Http\Controllers\Admin;

use App\Model\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class CoursesController extends Controller
{


    /**
     * Get All Courses
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all courses
        $courses = Courses::orderBy('id', 'DESC')->get();
        return view('admin.courses.index', ['courses' => $courses]);
    }


    /**
     * View Page Add Course
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.courses.create');
    }


    /**
     * store course in DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'course' => 'required',
            'description' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $course = new Courses();
        $course->title = $request->input('course');
        $course->description = $request->input('description');
        $course->active = 1;

        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();
            // Move Image
            $image->move('admin/files/images/courses', $newImage);
            // Store Image
            $course->image = $newImage;
        }

        $course->save();

        Session::flash('success', 'Course Added Successfully');
        return redirect('admin/courses');
    }

    /**
     * View data course
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data Course by id
        $course = Courses::find($id);
        // if Course return false => redirect abort 503
        if(!$course)
            abort(503);

        return view('admin.courses.view', ['course' => $course]);
    }


    /**
     * View Page Edit course
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data Course by id
        $course = Courses::find($id);
        // if Course return false => redirect abort 503
        if(!$course)
            abort(503);

        return view('admin.courses.edit', ['course' => $course]);
    }


    /**
     * Update data Course
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // get data Course by id
        $course = Courses::find($id);
        // if Course return false => redirect abort 503
        if(!$course)
            abort(503);


        $this->validate($request, [
            'course' => 'required',
            'description' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);


        $course->title = $request->input('course');
        $course->description = $request->input('description');

        $image = $request->file('image');
        // Get old Logo
        $oldImage = $course->image;

        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($image->move('admin/files/images/courses', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/courses/'.$oldImage)) {
                    // Delete old image
                    File::Delete('admin/files/images/courses/'.$oldImage);
                }
            }
            // else => upload new image
            $course->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $course->image = $oldImage;
        }

        $course->save();

        Session::flash('success', 'Course Updated Successfully');
        return redirect('admin/courses');

    }


    /**
     * active course
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active($id)
    {
        // get data Course by id
        $course = Courses::find($id);
        // if Course return false => redirect abort 503
        if(!$course)
            abort(503);

        $course->active = 1;
        $course->save();

        Session::flash('success', 'Course Activation Successfully');
        return redirect()->back();
    }


    /**
     * inactive course
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inactive($id)
    {
        // get data Course by id
        $course = Courses::find($id);
        // if Course return false => redirect abort 503
        if(!$course)
            abort(503);

        $course->active = 2;
        $course->save();

        Session::flash('success', 'Course Inactivation Successfully');
        return redirect()->back();
    }

}
