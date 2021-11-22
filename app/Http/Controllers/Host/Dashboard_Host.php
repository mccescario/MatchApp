<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Host extends Controller
{
    //
    public function index(Request $request)
    {
        //$username = $request->session()->get('name');, compact('username')
        return view('templates.host.main');
    }
}
