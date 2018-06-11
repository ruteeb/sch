<?php

namespace App\Http\Controllers\Admin;

use App\Model\Setting;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use File;

class SettingController extends Controller
{


    /**
     * view Setting Page
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        // get data setting from DB
        $setting = Setting::find(1);
        return view('admin.setting.edit', ['setting' => $setting]);
    }


    public function update(Request $request)
    {
        // Get Setting By id equal 1
        $setting = Setting::find(1);
        // if setting not return true => abort 503
        if(!$setting)
            abort(503);

        $this->validate($request, [
            'site_name' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'logo' => 'image|mimes:jpg,jpeg,png',
            'favicon' => 'image|mimes:jpg,jpeg,png',
            'address' => 'required',
            'keywords' => 'required',
            'description' => 'required',
        ],[],[
            'site_name' => 'Site Name',
        ]);


        $setting->site_name = $request->input('site_name');
        $setting->phone = $request->input('phone');
        $setting->email = $request->input('email');
        $setting->address = $request->input('address');
        $setting->keywords = $request->input('keywords');
        $setting->description = $request->input('description');

        $logo = $request->file('logo');
        // Get old Logo
        $oldLogo = $setting->logo;

        if($logo)
        {
            // Rename Image
            $newImage = sha1(uniqid('_m').time()).$logo->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($logo->move('admin/files/images/setting', $newImage))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/setting/'.$oldLogo)) {
                    // Delete old image
                    File::Delete('admin/files/images/setting/'.$oldLogo);
                }
            }
            // else => upload new image
            $setting->logo = $newImage;

        } else {
            // else => not choose new image
            // save old image
            $setting->logo = $oldLogo;
        }



        $favicon = $request->file('favicon');
        // Get old Logo
        $oldFavicon = $setting->favicon;

        if($favicon)
        {
            // Rename Image
            $newFavicon = sha1(uniqid('_m').time()).$favicon->getClientOriginalName();

            // Move Image
            // IF Move image return true
            if($favicon->move('admin/files/images/setting', $newFavicon))
            {
                // if exist path old image return true
                if(file_exists('admin/files/images/setting/'.$oldFavicon)) {
                    // Delete old image
                    File::Delete('admin/files/images/setting/'.$oldFavicon);
                }
            }
            // else => upload new image
            $setting->favicon = $newFavicon;

        } else {
            // else => not choose new image
            // save old image
            $setting->favicon = $oldFavicon;
        }


        $setting->save();

        Session::flash('success', 'Setting Updated Successfully');
        return redirect('admin/setting');
    }

}
