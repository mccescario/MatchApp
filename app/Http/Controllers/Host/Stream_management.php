<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Stream_management extends Controller
{
    //
    public function index()
    {
        return view('templates.host.stream_management');
    }
}
