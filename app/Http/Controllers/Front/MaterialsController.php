<?php

namespace App\Http\Controllers\Front;

use App\Model\Materials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MaterialsController extends Controller
{


    /**
     * get all materials activation
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all active Materials
        $materials = Materials::orderBy('id', 'DESC')->where('active', 1)->paginate(9);
        return view('front.materials', ['materials' => $materials]);
    }


    /**
     * view material details
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        // get data material by id
        $material = Materials::find($id);

        if(!$material)
            abort(404);

        return view('front.material-details', ['material' => $material]);
    }

}
