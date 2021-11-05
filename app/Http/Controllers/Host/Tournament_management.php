<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Models\Host\TournamentModel;
use Illuminate\Http\Request;

class Tournament_management extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $tournaments = TournamentModel::latest()->paginate(5);

        return view('templates/host/tournament_management', compact('tournaments'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('templates.host.tournament.tournament_reg');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([

            'tournament_name' => 'required',
            'tournament_date' => 'required',
            'tournament_sport' => 'required',
            'tournament_sport_type' => 'required',
            'tournament_bracket' => 'required',

        ]);

        TournamentModel::create($request->all());

        return redirect()->route('tournaments.index')
                        ->with('success','New tournament has been created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function show(TournamentModel $tournamentModel)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function edit(TournamentModel $tournamentModel)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TournamentModel $tournamentModel)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function destroy(TournamentModel $tournamentModel)
    {
        //
    }
}
