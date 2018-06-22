<?php

namespace App\Http\Controllers\Admin;

use App\Model\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class EventsController extends Controller
{

    public function index()
    {
        // get all events
        $events = Events::orderBy('id', 'DESC')->get();
        return view('admin.events.index', ['events' => $events]);
    }


    /**
     * View page Create events
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.events.create');
    }


    /**
     * Store Event In DB
     * @param Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $event = new Events();
        $event->title = $request->input('title');
        $event->content = $request->input('content');
        $event->date = $request->input('date');
        $event->active = 1;

        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();
            // Move Image
            $image->move('admin/files/images/events', $newImage);
            // Store Image
            $event->image = $newImage;
        }

        $event->save();

        Session::flash('success', 'Event Added Successfully');
        return redirect('admin/events');
    }


    /**
     * Show Page view data material
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $event = Events::find($id);

        if(!$event)
            abort(503);

        return view('admin.events.view', ['event' => $event]);
    }


    /**
     * View page edit material
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $event = Events::find($id);

        if(!$event)
            abort(503);

        return view('admin.events.edit', ['event' => $event]);
    }



    public function update(Request $request, $id)
    {
        $event = Events::find($id);
        if(!$event)
            abort(503);


        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'date' => 'required|date',
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);


        $event->title = $request->input('title');
        $event->content = $request->input('content');
        $event->date = $request->input('date');

        $image = $request->file('image');
        // Get old Logo
        $oldImage = $event->image;

        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($image->move('admin/files/images/events', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/events/'.$oldImage)) {
                    // Delete old image
                    File::Delete('admin/files/images/events/'.$oldImage);
                }
            }
            // else => upload new image
            $event->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $event->image = $oldImage;
        }

        $event->save();

        Session::flash('success', 'Event Updated Successfully');
        return redirect('admin/events');

    }




    public function active($id)
    {
        // get data Event by id
        $event = Events::find($id);
        // if Event return false => redirect abort 503
        if(!$event)
            abort(503);

        $event->active = 1;
        $event->save();

        Session::flash('success', 'Event Activation Successfully');
        return redirect()->back();
    }


    /**
     * inactive course
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inactive($id)
    {
        // get data Event by id
        $event = Events::find($id);
        // if Event return false => redirect abort 503
        if(!$event)
            abort(503);

        $event->active = 0;
        $event->save();

        Session::flash('success', 'Event Inactivation Successfully');
        return redirect()->back();
    }


}
