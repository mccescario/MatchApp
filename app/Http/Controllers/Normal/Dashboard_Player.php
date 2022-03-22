<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Player\NewsFeed;
use Illuminate\Http\Request;

class Dashboard_Player extends Controller
{
    //
    public function index(Request $request)
    {
        return view('templates.normal.dashboard')
                ->with('news_feed',NewsFeed::orderBy('updated_at','DESC')->get());
    }
}
