<?php

namespace App\Http\Controllers\Admin;

use App\Model\Classes;
use App\Model\Courses;
use App\Model\CoursesClass;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class ClassesController extends Controller
{

    /**
     * Get All Classes
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all classes
        $classes = Classes::orderBy('id', 'Desc')->get();
        return view('admin.classes.index', ['classes' => $classes]);
    }


    /**
     * view page add class
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // get all courses to view in page add class
        $courses = Courses::orderBy('id', 'DESC')->get();
        return view('admin.classes.create', ['courses' => $courses]);
    }


    /**
     * Store Class in DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'course' => 'required',
            'class' => 'required'
        ]);

        $class = new Classes();
        $class->title = $request->input('class');
        $class->course_id = $request->input('course');
        $class->active = 1;
        $class->save();

        Session::flash('success', 'Class Added Successfully');
        return redirect('admin/classes');
    }


    /**
     * View page edit class
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data class
        $class = Classes::find($id);

        if(!$class)
            abort(503);

        // get all courses to view in page Edit class
        $courses = Courses::orderBy('id', 'DESC')->get();
        return view('admin.classes.edit', ['class' => $class, 'courses' => $courses ]);
    }


    /**
     * update Course
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // get data class
        $class = Classes::find($id);

        if(!$class)
            abort(503);

        $class->title = $request->input('class');
        $class->course_id = $request->input('course');
        $class->save();

        Session::flash('success', 'Class Updated Successfully');
        return redirect('admin/classes');
    }


    /**
     * active class
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function active($id)
    {
        // get data class
        $class = Classes::find($id);

        if(!$class)
            abort(503);

        $class->active = 1;
        $class->save();

        Session::flash('success', 'Class Activation Successfully');
        return redirect('admin/classes');
    }


    /**
     * Inactive class
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function inactive($id)
    {
        // get data class
        $class = Classes::find($id);

        if(!$class)
            abort(503);

        $class->active = 0;
        $class->save();

        Session::flash('success', 'Class Inactivation Successfully');
        return redirect('admin/classes');
    }

}
