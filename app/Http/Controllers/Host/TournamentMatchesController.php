<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\TournamentMatch;
use Illuminate\Http\Request;

class TournamentMatchesController extends Controller
{
    public function show(TournamentMatch $tournamentMatch)
    {
        return view('templates.host.tournament_matches.show')
            ->with('match', $tournamentMatch);
    }

    public function updateStreamLink(Request $request, TournamentMatch $tournamentMatch)
    {
        $request->validate([
            'stream_link' => 'required|max:500',
        ]);

        $tournamentMatch->update($request->only('stream_link'));

        return redirect()->route('matches.show', $tournamentMatch->id);
    }
}
