<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index()
    {

        return view('templates.host.team');
    }


    public function profile(Team $team)
    {
        return view('templates.host.team-profile')
            ->with('team', $team);
    }
}
