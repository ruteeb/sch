<?php

namespace App\Http\Controllers\Front;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use File;

class UserController extends Controller
{


    /**
     * show page profile user
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.profile');
    }


    /**
     * Update Profile
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request)
    {
        $userId = auth()->user()->id;
        
        $user = User::find($userId);
        
        $this->validate($request, [
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users,email,'.auth()->user()->id,
            'phone' => 'required|numeric',
            'image' => 'image|mimes:jpg,jpeg,png',
        ],[],[
            'first_name' => 'Voornaam',
            'last_name' => 'Achternaam',
            'email' => 'E-mail',
            'phone' => 'Telefoon',
            'password' => 'Wachtwoord',
            'image' => 'Beeld'
        ]);

        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->email = $request->input('email');
        $user->phone = $request->input('phone');
        // Get Old Password User
        $oldPassword = $user->password;
        if(!empty($request->input('password'))) {
            $user->password =  bcrypt($request->input('password'));
        } else {
            $user->password = $oldPassword;
        }


        $image = $request->file('image');
        // Get old Logo
        $oldImage = $user->image;

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
            $user->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $user->image = $oldImage;
        }

        $user->save();

        Session::flash('success', 'Profile Updated Successfully');
        return redirect('profile');
        
    }

}
