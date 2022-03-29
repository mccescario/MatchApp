<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Host\Team;
use Illuminate\Http\Request;

class TeamController extends Controller
{
    //
    public function index()
    {

        return view('templates.host.team');
    }
}


?>
