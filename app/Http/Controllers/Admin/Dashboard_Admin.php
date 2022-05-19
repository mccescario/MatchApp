<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Dashboard_Admin extends Controller
{
    public function index()
    {
        return view('templates.admin.dashboard');
    }
}
