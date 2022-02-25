<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $role = Auth::user()->role;

        $checkrole = explode(',', $role);

        if (in_array('1', $checkrole)) {
            return redirect('admin-dashboard');
        }
        elseif (in_array('2', $checkrole)) {
            return redirect('host-dashboard');
        }
        elseif (in_array('3', $checkrole)) {
            return redirect('player-dashboard');
        }
        else {
            return view('templates.host.main');
        }
    }

    public function logout(Request $request)
    {
        $logout = $request->session()->flush();
        return view('main');
    }

}
