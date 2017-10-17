<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use File;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct()
    {
    	$this->middleware('auth');
    }

    public function profile_page()
    {
        $user = Auth::user();
        return view('admin.profilepage',compact('user'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function profile_update(Request $request)
    {
        $this->validate($request,[
                'name' => 'required',
                'email'=>'required|email',
                'password'=>'required',
                'facebook'=>'required|url',
                'youtube'=>'required|url',
                'avatar'=>'image'
            ]);

        $user = Auth::User();
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->password = bcrypt($request['password']);
        $user->profile->facebook =  $request->facebook;
        $user->profile->youtube = $request->youtube;
        $user->profile->about = $request->about;
        if ($request->hasFile('avatar')) {
            File::delete($user->profile->avatar);
            $avatar = $request->file('avatar');
            $new_avatar = time() . "." . $avatar->getClientOriginalExtension();
            $avatar->move('uploads/profiles',$new_avatar);
            $user->profile->avatar = 'uploads/profiles/'. $new_avatar;
            $user->profile->update();
        }

        $user->save();
        $user->profile->save();

        return redirect('/dashboard')->with(['success'=>'Your profile was successfully updated!']);



    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        //
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
