<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Host extends Controller
{
    //
    public function index()
    {
        return view('templates.admin.dashboard');
    }
}
