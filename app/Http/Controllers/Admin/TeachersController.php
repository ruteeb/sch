<?php

namespace App\Http\Controllers\Admin;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class TeachersController extends Controller
{


    /**
     * Get All Teachers
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all teachers
        $teachers = User::where('level', 'teacher')->orderBy('id', 'DESC')->get();
        return view('admin.teachers.index', ['teachers' => $teachers]);
    }


    /**
     * View Page add Teacher
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
{
    return view('admin.teachers.create');
}


    /**
     * Store new teacher in DB
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
            'city' => 'required',
        ],[],[
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'bsn_number' => 'Bsn Number',
            'post_code' => 'Post Code',
            'home_number' => 'Home Number',
            'street_name' => 'Street Name'
        ]);


        $teacher = new User();
        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->email = $request->input('email');
        $teacher->password = bcrypt($request->input('password'));
        $teacher->phone = $request->input('phone');
        $teacher->birthday = $request->input('birthday');
        $teacher->post_code = $request->input('post_code');
        $teacher->home_number = $request->input('home_number');
        $teacher->bsn_number = $request->input('bsn_number');
        $teacher->extension = $request->input('extension');
        $teacher->street_name = $request->input('street_name');
        $teacher->city = $request->input('city');
        $teacher->province = $request->input('province');
        $teacher->level = 'teacher';
        $teacher->active = 1;

        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();
            // Move Image
            $image->move('admin/files/images/teachers', $newImage);
            // Store Image
            $teacher->image = $newImage;
        }

        $teacher->save();

        Session::flash('success', 'Teacher Added Successfully');
        return redirect('admin/teachers');
    }


    /**
     * View Details Teacher
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data Teacher by id
        $teacher = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$teacher)
            abort(503);

        return view('admin.teachers.view', ['teacher' => $teacher]);
    }


    /**
     * View page edit teacher
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        // get data Teacher by id
        $teacher = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$teacher)
            abort(503);

        return view('admin.teachers.edit', ['teacher' => $teacher]);
    }


    /**
     * Update Teacher
     * @param Request $request
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        // get data Teacher by id
        $teacher = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$teacher)
            abort(503);

        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.$teacher->id,
            'phone' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png',
            'birthday' => 'required',
            'bsn_number' => 'required',
            'post_code' => 'required',
            'home_number' => 'required',
            'extension' => 'required',
            'province' => 'required',
            'street_name' => 'required',
            'city' => 'required',
        ],[],[
            'first_name' => 'First Name',
            'last_name' => 'Last Name',
            'bsn_number' => 'Bsn Number',
            'post_code' => 'Post Code',
            'home_number' => 'Home Number',
            'street_name' => 'Street Name'
        ]);

        $teacher->first_name = $request->input('first_name');
        $teacher->last_name = $request->input('last_name');
        $teacher->email = $request->input('email');
        $teacher->phone = $request->input('phone');
        $teacher->birthday = $request->input('birthday');
        $teacher->post_code = $request->input('post_code');
        $teacher->home_number = $request->input('home_number');
        $teacher->bsn_number = $request->input('bsn_number');
        $teacher->extension = $request->input('extension');
        $teacher->street_name = $request->input('street_name');
        $teacher->city = $request->input('city');
        $teacher->province = $request->input('province');

        // Get Old Password Admin
        $oldPassword = $teacher->password;
        if(!empty($request->input('password'))) {
            $teacher->password =  bcrypt($request->input('password'));
        } else {
            $teacher->password = $oldPassword;
        }

        $image = $request->file('image');
        // Get old Logo
        $oldImage = $teacher->image;

        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($image->move('admin/files/images/teachers', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/teachers/'.$oldImage)) {
                    // Delete old image
                    File::Delete('admin/files/images/teachers/'.$oldImage);
                }
            }
            // else => upload new image
            $teacher->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $teacher->image = $oldImage;
        }

        $teacher->save();

        Session::flash('success', 'Teacher Updated Successfully');
        return redirect('admin/teachers');
    }


    /**
     * Active teacher
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function active($id)
    {
        // get data Teacher by id
        $teacher = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$teacher)
            abort(503);

        $teacher->active = 1;
        $teacher->save();

        Session::flash('success', 'Teacher Activation Successfully');
        return redirect()->back();
    }


    /**
     * Inactive teacher
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function inactive($id)
    {
        // get data Teacher by id
        $teacher = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$teacher)
            abort(503);

        $teacher->active = 0;
        $teacher->save();

        Session::flash('success', 'Teacher Inactivation Successfully');
        return redirect()->back();
    }


    /**
     * Delete Teacher
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        // get data Teacher by id
        $teacher = User::find($id);
        // if Teacher return false => redirect abort 503
        if(!$teacher)
            abort(503);

        $teacher->delete();
        // Delete Image
        File::Delete('admin/files/images/teachers/'.$teacher->image);

        Session::flash('success', 'Teacher Deleted Successfully');
        return redirect('admin/teachers');
    }


    /**
     * Multi Deleted Selected
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function multidelete(Request $request)
    {

        if(!empty($request->input('multidelet'))) {

            foreach ($request->input('multidelet') as $multidelete) {

                $teacher = User::find($multidelete);
                // if teacher return false => redirect abort 503 page
                if (!$teacher) {
                    abort(503);
                }
                // teachers Delete
                $teacher->Delete();
                File::Delete('admin/files/images/teachers/'.$teacher->image);
            }
        } else {
            Session::flash('warning', 'Not Selected Data Please Select Data');
            return redirect('admin/teachers');
        }

        Session::flash('success', 'Data About Selected Deleted Successfully');
        return redirect('admin/teachers');
    }

}
