<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Player\NewsFeed;
use Illuminate\Http\Request;

class Dashboard_Host extends Controller
{
    //
    public function index(Request $request)
    {

        return view('templates.host.dashboard')
                ->with('news_feed',NewsFeed::orderBy('updated_at','DESC')->get());
    }
}
