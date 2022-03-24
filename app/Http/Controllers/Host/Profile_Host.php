<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Host\HostProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class Profile_Host extends Controller
{
    //
    public function index($id)
    {
        $profile = DB::table('users')->where('id','=',$id)->get();

        return view('templates.host.profile',compact('profile'));
    }

    public function update(Request $request, $user)
    {
        //
        $user = User::find($user);

        $user->update($request->all());

        return redirect()->route('profile')->with('success','Profile updated successfully');

    }


}
