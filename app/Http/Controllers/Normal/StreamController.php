<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class StreamController extends Controller
{
    //

    public function index()
    {
        return view('templates.normal.stream');
    }
}
