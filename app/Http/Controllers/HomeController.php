<?php

namespace App\Http\Controllers;

use App\Model\Courses;
use App\Model\Events;
use App\Model\Materials;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all activate courses
        $courses = Courses::orderby('id', 'DESC')->where('active', 1)->get();
        // get all activate materials
        $materials = Materials::orderBy('id', 'DESC')->where('active', 1)->get();
        // get all activate events
        $events = Events::orderBy('id', 'DESC')->where('active', 1)->get();

        return view('welcome', ['courses' => $courses, 'materials' => $materials, 'events' => $events]);
    }
}
