<?php

namespace App\Http\Controllers\Front;

use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use Mail;

class ContactController extends Controller
{


    /**
     * view contact page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('front.contact');
    }


    public function sendMessage(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'subject' => 'required',
            'email' => 'required|email',
            'phone' => 'required|numeric',
            'message' => 'required',
        ]);

        $emailSetting = Setting::first();

        $data = array(
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'subject' => $request->input('subject'),
            'phone' => $request->input('phone'),
            'messages' => $request->input('message'),
            'emailSetting' => $emailSetting->email,
        );

        Mail::send('front.contact-message',$data, function($message) use($data)
        {
            $message->from($data['email'],$data['subject']);

            $message->to($data['emailSetting'], 'Admin')->subject('Contact Form Oranje');
        });

        Session::flash('success', 'Send Message Successfully');
        return redirect('contact');

    }

}
