<?php

namespace App\Http\Controllers\Front;

use App\Model\Courses;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{


    /**
     * Get Data Search
     * @param Request $request
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function searchGet(Request $request)
    {
        $search = $request->input('q');

        $courses = Courses::where('title', 'LIKE', '%'.$search.'%')->paginate(9);

        return view('front.search', ['courses' => $courses]);
    }

}
