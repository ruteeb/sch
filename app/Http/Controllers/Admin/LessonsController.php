<?php

namespace App\Http\Controllers\Admin;

use App\Model\Classes;
use App\Model\Lessons;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

use File;

class LessonsController extends Controller
{


    /**
     * Get all lessons online only
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all lessons where online equal 1
        $lessons = Lessons::where('online', 1)->orderBy('id', 'DESC')
            ->join('classes', 'classes.id', '=', 'lessons.class_id')
            ->select('lessons.*', 'classes.title AS ClassName')
            ->get();
        return view('admin.lessons.index', ['lessons' => $lessons]);
    }


    public function offline()
    {
        // get all lessons where online equal 0
        $lessons = Lessons::where('online', 0)->orderBy('id', 'DESC')
            ->join('classes', 'classes.id', '=', 'lessons.class_id')
            ->select('lessons.*', 'classes.title AS ClassName')
            ->get();
        return view('admin.lessons.offline', ['lessons' => $lessons]);
    }


    /**
     * View page create Lesson
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        // get all classes
        $classes = Classes::get();

        return view('admin.lessons.create', ['classes' => $classes]);
    }


    /**
     * Store Lesson In DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
           'class' => 'required',
            'title' => 'required',
            'video' => 'required|mimes:avi,mp4,mpeg',
            'content' => 'required'
        ]);

        $lesson = new Lessons();
        $lesson->title = $request->input('title');
        $lesson->content = $request->input('content');
        $lesson->class_id = $request->input('class');
        $lesson->online = 0;
        $lesson->active = 1;

        $video = $request->file('video');
        if($video)
        {
            // Rename video
            $newVideo = sha1(uniqid('_m').time()).$video->getClientOriginalName();
            // Move Image
            $video->move('admin/files/images/lessons', $newVideo);
            // Store Image
            $lesson->video = $newVideo;
        }

        $lesson->save();

        Session::flash('success', 'Lesson Added Successfully');
        return redirect('admin/lessons-offline');
    }


    /**
     * view page preview lesson
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $lesson = Lessons::find($id)->join('classes', 'classes.id', '=', 'lessons.class_id')
            ->select('lessons.*', 'classes.title AS ClassName')
        ->first();

        if(!$lesson)
            abort(503);

        return view('admin.lessons.view', ['lesson' => $lesson]);

    }


    /**
     * View page edit lesson
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $lesson = Lessons::find($id);

        if(!$lesson)
            abort(503);

        // get all classes
        $classes = Classes::get();

        return view('admin.lessons.edit', ['lesson' => $lesson, 'classes' => $classes]);

    }



    public function update($id, Request $request)
    {
        $lesson = Lessons::find($id);

        if(!$lesson)
            abort(503);

        $this->validate($request, [
            'class' => 'required',
            'title' => 'required',
            'video' => 'mimes:avi,mp4,mpeg',
            'content' => 'required'
        ]);


        $lesson->title = $request->input('title');
        $lesson->content = $request->input('content');
        $lesson->class_id = $request->input('class');


        $image = $request->file('video');
        // Get old Logo
        $oldImage = $lesson->video;

        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($image->move('admin/files/images/lessons', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/lessons/'.$oldImage)) {
                    // Delete old image
                    File::Delete('admin/files/images/lessons/'.$oldImage);
                }
            }
            // else => upload new image
            $lesson->video = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $lesson->video = $oldImage;
        }

        $lesson->save();

        Session::flash('success', 'Lesson Updated Successfully');
        return redirect('admin/lessons');

    }


    /**
     * active lesson
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function active($id)
    {
        $lesson = Lessons::find($id);

        if(!$lesson)
            abort(503);

        $lesson->active = 1;
        $lesson->save();

        Session::flash('success', 'Lesson Activation Successfully');
        return redirect()->back();
    }


    /**
     * inactive lesson
     * @param $id
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function inactive($id)
    {
        $lesson = Lessons::find($id);

        if(!$lesson)
            abort(503);

        $lesson->active = 0;
        $lesson->save();

        Session::flash('success', 'Lesson Inactivation Successfully');
        return redirect()->back();
    }

}
