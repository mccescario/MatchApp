<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Team::with(['team_members'])->get();
        return response()->json($teams, 200);
    }

    public function myteams($id)
    {
        $myteams = User::with(['team_members'])->where('user_id',$id)->get();
        return $myteams;
    }
}
