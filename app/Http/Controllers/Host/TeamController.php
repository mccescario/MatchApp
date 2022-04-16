<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
<<<<<<< HEAD
use App\Models\Host\Team;
=======
use App\Models\Team;
>>>>>>> dev/MC-revisions
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index()
    {

        return view('templates.host.team');
    }
<<<<<<< HEAD
}


?>
=======


    public function profile(Team $team)
    {
        return view('templates.host.team-profile')
            ->with('team', $team);
    }
}
>>>>>>> dev/MC-revisions
