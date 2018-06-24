<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class VideoController extends Controller
{

    public function classOnline()
    {
        return view('front.video');
    }


    /**
     * view page main class details
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mainDetailsClass()
    {
        return view('front.main-class-details');
    }


    /**
     * view page main class
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function mainClass()
    {
        return view('front.main-class');
    }



    public function lessonRecording()
    {
        return view('front.lesson-recording');
    }

}
