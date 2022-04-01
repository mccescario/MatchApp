<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Player\PlayerProfile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Auth;

class Profile_management extends Controller
{
    //
    public function index()
    {
        //$profile = DB::table('sport_profile')->where('user_id','=',$id)->get();
        //$team = DB::table('users')->join('team','users.id','=','team.id')->where('team.id',$id)->get('team.team_name');
        //$player = DB::table('users')->where('id','=',$id)->get();
        //$sport_stat = DB::table('users');

        return view('templates.normal.profile');//,compact('player')
    }

    public function update(Request $request,$id)
    {
        //
        // $profile = PlayerProfile::find($request->id);
        $user = User::find($id);

        $user->fill($request->all());
        $user->save();
        // $profile->fill($request->all());
        // $profile->save();
        

        return redirect()->route('profile')->with('success','Profile updated successfully');

    }


}
