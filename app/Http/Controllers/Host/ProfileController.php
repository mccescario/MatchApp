<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Host\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    //
    public function index()
    {

        return view('templates.host.profile');
    }
}
?>
