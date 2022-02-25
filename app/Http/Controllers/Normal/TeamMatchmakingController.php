<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Player\TeamModel;
use App\Models\Player\TeamMembers;
use App\Models\Player\PlayerProfile;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamMatchmakingController extends Controller
{
    //

    public function team_manage($id)
    {
        $i = 0;
        $user = User::find($id);
        $team = TeamModel::find($user->team);
        $members = TeamMembers:://where('team_id','=',$user->team)
                    join('users','users.team','=','team_members.team_id')
                    //->('sport_profile','sport_profile.id','=','team_members.sport_profile_id')
                    ->get([/*'sport_profile.ign','sport_profile.position',*/'users.name']);

        return view('templates.normal.team',compact('team','members','i','user'));
    }

    public function member_view($id)
    {
        $user = User::find($id);
        return view('templates.normal.team.player_profile',compact('user'));
    }
}
