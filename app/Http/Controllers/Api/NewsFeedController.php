<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Player\NewsFeed;
use Illuminate\Http\Request;

class NewsFeedController extends Controller
{
    public function news()
    {
        $feed = NewsFeed::orderBy('created_at','DESC')->get();
        $feed = $feed->makeHidden('user');
        return response()->json($feed, 200);
    }
}
