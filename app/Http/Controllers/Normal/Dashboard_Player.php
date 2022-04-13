<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Host\TournamentModel;
use App\Models\Player\NewsFeed;
use App\Models\TournamentMatch;
use Illuminate\Http\Request;

class Dashboard_Player extends Controller
{
    //
    public function index()
    {
        $matches = TournamentMatch::where('is_current', true)->orderBy('updated_at')->paginate(10);

        return view('templates.normal.dashboard')
            ->with('matches', $matches);
    }

    public function tournaments(Request $request)
    {
        $query = TournamentModel::orderBy('updated_at');

        if ($request->has('search')) {
            $query->where('tournament_name', 'LIKE', '%' . $request->query('search') . '%');
        }

        if ($request->has('category')) {
            $query->where('tournament_sport_type', $request->query('category'));
        }

        // dd($request->query('search'));

        return view('templates.normal.dashboard-tournament')
            ->with('tournaments', $query->paginate(10));
    }
}
