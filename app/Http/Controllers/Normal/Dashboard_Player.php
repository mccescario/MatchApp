<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Player extends Controller
{
    //
    public function index()
    {
        return view('templates.normal.dashboard');
    }
}
