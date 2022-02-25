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
    public function index($id)
    {
        $profile = DB::table('sport_profile')->where('user_id','=',$id)->get();
        $team = DB::table('users')
                    ->join('team','users.id','=','team.id')
                    ->where('team.id',$id)
                    ->get('team.team_name');

        return view('templates.normal.profile',compact('profile','team'));
    }

    public function update(Request $request, $user)
    {
        //
        $profile = PlayerProfile::find($user);
        $user = User::find($user);

        $user->update($request->all());
        $profile->update($request->all());

        return redirect()->route('profile')->with('success','Profile updated successfully');

    }


}
