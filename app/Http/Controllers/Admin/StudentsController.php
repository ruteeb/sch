<?php

namespace App\Http\Controllers\Admin;

use App\Model\ClassesTeacher;
use App\Model\Courses;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class StudentsController extends Controller
{


    /**
     * Gel All Students
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all Students
        $students = User::where('level', 'student')->orderBy('id', 'DESC')->get();
        return view('admin.students.index', ['students' => $students]);
    }


    /**
     * View page add student
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // get all courses to view in page add class
        $courses = Courses::orderBy('id', 'DESC')->get();
        return view('admin.students.create', ['courses' => $courses]);
    }


    /**
     * Store Student In DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'phone' => 'required|numeric',
            'image' => 'required|image|mimes:jpg,jpeg,png',
            'birthday' => 'required',
            'bsn_number' => 'required',
            'post_code' => 'required',
            'home_number' => 'required',
            'extension' => 'required',
            'province' => 'required',
            'street_name' => 'required',
            'start_borrow' => 'required',
            'end_borrow' => 'required',
            'start_residence' => 'required',
            'end_residence' => 'required',
            'city' => 'required',
        ],[],[
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'bsn_number' => 'Bsn Number',
            'post_code' => 'Post Code',
            'home_number' => 'Home Number',
            'street_name' => 'Street Name',
            'start_borrow' => 'Start Borrow',
            'end_borrow' => 'End Borrow',
            'start_residence' => 'Start Residence',
            'end_residence' => 'End Residence',
        ]);


        $student = new User();
        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->password = bcrypt($request->input('password'));
        $student->phone = $request->input('phone');
        $student->birthday = $request->input('birthday');
        $student->post_code = $request->input('post_code');
        $student->home_number = $request->input('home_number');
        $student->bsn_number = $request->input('bsn_number');
        $student->extension = $request->input('extension');
        $student->street_name = $request->input('street_name');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->start_borrow = $request->input('start_borrow');
        $student->end_borrow = $request->input('end_borrow');
        $student->start_residence = $request->input('start_residence');
        $student->end_residence = $request->input('end_residence');
        $student->level = 'student';
        $student->active = 1;

        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();
            // Move Image
            $image->move('admin/files/images/users', $newImage);
            // Store Image
            $student->image = $newImage;
        }

        $student->save();


        $unique_array = [];
        // foreach classes requests
        foreach ($request->input('classes') as $class) {
            // add class id in array
            array_push($unique_array, $class);
        }

        // unique array for delete duplicate value in array
        $idsClasses = array_unique($unique_array);
        // foreach ids classes for store in DB
        foreach ($idsClasses as $idClasse) {
            $studentClass = new ClassesTeacher()    ;
            $studentClass->class_id = $idClasse;
            $studentClass->user_id = $student->id;
            $studentClass->save();
        }

        Session::flash('success', 'Student Added Successfully');
        return redirect('admin/students');
    }


    /**
     * View Student data
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data Teacher by id
        $student = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$student)
            abort(503);

        // get all Student classes fot this Student For Delete and new store
        $studentClasses = ClassesTeacher::where('user_id', $student->id)->get();

        return view('admin.students.view', ['student' => $student, 'studentClasses' => $studentClasses]);
    }


    /**
     * View Page Edit Student
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data Student by id
        $student = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$student)
            abort(503);


        // get all courses to view in page add class
        $courses = Courses::orderBy('id', 'DESC')->get();
        // get all student classes fot this student
        $studentClasses = ClassesTeacher::where('user_id', $student->id)->get();

        return view('admin.students.edit', ['student' => $student, 'courses' => $courses, 'studentClasses' => $studentClasses]);
    }


    /**
     * Update Student
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // get data Student by id
        $student = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$student)
            abort(503);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$student->id,
            'phone' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png',
            'birthday' => 'required',
            'bsn_number' => 'required',
            'post_code' => 'required',
            'home_number' => 'required',
            'extension' => 'required',
            'province' => 'required',
            'street_name' => 'required',
            'start_borrow' => 'required',
            'end_borrow' => 'required',
            'start_residence' => 'required',
            'end_residence' => 'required',
            'city' => 'required',
        ],[],[
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'bsn_number' => 'Bsn Number',
            'post_code' => 'Post Code',
            'home_number' => 'Home Number',
            'street_name' => 'Street Name',
            'start_borrow' => 'Start Borrow',
            'end_borrow' => 'End Borrow',
            'start_residence' => 'Start Residence',
            'end_residence' => 'End Residence',
        ]);

        $student->first_name = $request->input('first_name');
        $student->last_name = $request->input('last_name');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->birthday = $request->input('birthday');
        $student->post_code = $request->input('post_code');
        $student->home_number = $request->input('home_number');
        $student->bsn_number = $request->input('bsn_number');
        $student->extension = $request->input('extension');
        $student->street_name = $request->input('street_name');
        $student->city = $request->input('city');
        $student->province = $request->input('province');
        $student->start_borrow = $request->input('start_borrow');
        $student->end_borrow = $request->input('end_borrow');
        $student->start_residence = $request->input('start_residence');
        $student->end_residence = $request->input('end_residence');

        // Get Old Password Admin
        $oldPassword = $student->password;
        if(!empty($request->input('password'))) {
            $student->password =  bcrypt($request->input('password'));
        } else {
            $student->password = $oldPassword;
        }

        $image = $request->file('image');
        // Get old Logo
        $oldImage = $student->image;

        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($image->move('admin/files/images/users', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/users/'.$oldImage)) {
                    // Delete old image
                    File::Delete('admin/files/images/users/'.$oldImage);
                }
            }
            // else => upload new image
            $student->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $student->image = $oldImage;
        }

        $student->save();


        // get all student classes fot this student For Delete and new store
        $studentClasses = ClassesTeacher::where('user_id', $student->id)->get();
        // foreach for delete old student class
        foreach ($studentClasses as $studentClass) {
            $suClass = ClassesTeacher::find($studentClass->id);
            $suClass->delete();
        }

        $unique_array = [];
        // foreach classes requests
        foreach ($request->input('classes') as $class) {
            // add class id in array
            array_push($unique_array, $class);
        }

        // unique array for delete duplicate value in array
        $idsClasses = array_unique($unique_array);
        // foreach ids classes for store in DB
        foreach ($idsClasses as $idClasse) {
            $stuClass = new ClassesTeacher();
            $stuClass->class_id = $idClasse;
            $stuClass->user_id = $student->id;
            $stuClass->save();
        }

        Session::flash('success', 'Students Updated Successfully');
        return redirect('admin/students');
    }


    /**
     * Active student
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function active($id)
    {
        // get data Student by id
        $student = User::find($id);
        // if Student return false => redirect abort 503
        if(!$student)
            abort(503);

        $student->active = 1;
        $student->save();

        Session::flash('success', 'Student Activation Successfully');
        return redirect()->back();
    }


    /**
     * Inactive student
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inactive($id)
    {
        // get data Student by id
        $student = User::find($id);
        // if Student return false => redirect abort 503
        if(!$student)
            abort(503);

        $student->active = 0;
        $student->save();

        Session::flash('success', 'Student Inactivation Successfully');
        return redirect()->back();
    }


}
