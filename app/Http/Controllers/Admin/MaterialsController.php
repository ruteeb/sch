<?php

namespace App\Http\Controllers\Admin;

use App\Model\Materials;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class MaterialsController extends Controller
{

    /**
     * Get all materials
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get all materials
        $materials = Materials::orderBy('id', 'DESC')->get();
        return view('admin.materials.index', ['materials' => $materials]);
    }


    /**
     * View page Create material
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function create()
    {
        return view('admin.materials.create');
    }
    
    
    
    public function store(Request $request)
    {
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'required|image|mimes:jpg,jpeg,png'
        ]);

        $material = new Materials();
        $material->title = $request->input('title');
        $material->content = $request->input('content');
        $material->active = 1;

        $image = $request->file('image');
        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();
            // Move Image
            $image->move('admin/files/images/materials', $newImage);
            // Store Image
            $material->image = $newImage;
        }

        $material->save();

        Session::flash('success', 'Material Added Successfully');
        return redirect('admin/materials');
    }


    /**
     * Show Page view data material
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function view($id)
    {
        $material = Materials::find($id);

        if(!$material)
            abort(503);

        return view('admin.materials.view', ['material' => $material]);
    }


    /**
     * View page edit material
     * @param $id
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $material = Materials::find($id);

        if(!$material)
            abort(503);

        return view('admin.materials.edit', ['material' => $material]);
    }



    public function update(Request $request, $id)
    {
        $material = Materials::find($id);
        if(!$material)
            abort(503);


        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'image' => 'image|mimes:jpg,jpeg,png'
        ]);


        $material->title = $request->input('title');
        $material->content = $request->input('content');

        $image = $request->file('image');
        // Get old Logo
        $oldImage = $material->image;

        if($image)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$image->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($image->move('admin/files/images/materials', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/materials/'.$oldImage)) {
                    // Delete old image
                    File::Delete('admin/files/images/materials/'.$oldImage);
                }
            }
            // else => upload new image
            $material->image = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $material->image = $oldImage;
        }

        $material->save();

        Session::flash('success', 'Material Updated Successfully');
        return redirect('admin/materials');

    }




    public function active($id)
    {
        // get data Materials by id
        $material = Materials::find($id);
        // if Material return false => redirect abort 503
        if(!$material)
            abort(503);

        $material->active = 1;
        $material->save();

        Session::flash('success', 'Material Activation Successfully');
        return redirect()->back();
    }


    /**
     * inactive course
     * @param $id
     * @return \Illuminate\Http\RedirectResponse
     */
    public function inactive($id)
    {
        // get data Materials by id
        $material = Materials::find($id);
        // if Material return false => redirect abort 503
        if(!$material)
            abort(503);

        $material->active = 0;
        $material->save();

        Session::flash('success', 'Material Inactivation Successfully');
        return redirect()->back();
    }

}
