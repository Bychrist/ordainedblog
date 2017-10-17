<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Setting;
use File;

class SettingController extends Controller
{
    
   
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function setting_page()
    {
        $setting = Setting::first();
        return view('admin.settings', compact('setting'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function setting_update(Request $request)
    {
        $this->validate($request,['site_logo'=>'image|dimensions:width=100,height=100','site_name'=>'required','contact'=>'required','copyright'=>'required']);
        $setting = Setting::first();
        if($request->hasFile('site_logo'))
        {
            File::delete($stting->site_logo);
            $logo = $request->file('site_logo');
            $new_logo = time(). "." . $logo->getClientOriginalExtension();
            $logo->move('uploads/images',$new_logo);
            $setting->site_logo = 'uploads/images/' . $new_logo;
            $setting->update();
        }
        $setting->site_name = $request['site_name'];
        $setting->copyright = $request['copyright'];
        $setting->contact = $request['contact'];
        $setting->update();
        return redirect()->back()->with(['success'=>'Site setting was successful!']);

    }

    /**
    
   
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
