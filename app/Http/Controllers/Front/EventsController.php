<?php

namespace App\Http\Controllers\Front;

use App\Model\Events;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class EventsController extends Controller
{


    /**
     * get activation materials
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all active Events
        $events = Events::orderBy('id', 'DESC')->where('active', 1)->paginate(9);
        return view('front.events', ['events' => $events]);
    }


    /**
     * view details event page
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data event by id
        $event = Events::find($id);

        if(!$event)
            abort(404);

        return view('front.event-details', ['event' => $event]);
    }

}
