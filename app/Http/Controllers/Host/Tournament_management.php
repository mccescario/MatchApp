<?php

namespace App\Http\Controllers\Host;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Bracket\Builder as BracketBuilder;
use App\Http\Helpers\Bracket\Visualizer;
use App\Models\Host\TournamentModel;
use App\Models\TeamParticipant;
use App\Models\TeamBracket;
<<<<<<< HEAD
use Illuminate\Http\Request;
use DB;
=======
use Builder;
use Illuminate\Http\Request;
use DB;
use Illuminate\Support\Arr;
>>>>>>> dev/MC-revisions

class Tournament_management extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $tournaments = TournamentModel::latest()->paginate(5);

        return view('templates.host.tournament_management', compact('tournaments'))
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
            'tournament_sport_type' => 'required',
            'tournament_format' => 'required',
            'tournament_size' => 'required',
            'tournament_series' => 'required',
            'tournament_date_from' => 'required',
            'tournament_date_to' => 'required',
            'tournament_time' => 'required',

        ]);

        TournamentModel::create($request->all());

        return redirect()->route('tournament_manage')
<<<<<<< HEAD
                        ->with('success','New tournament has been created successfully.');
=======
            ->with('success', 'New tournament has been created successfully.');
>>>>>>> dev/MC-revisions
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function show($tournamentModel)
    {
        //
        $tournament = TournamentModel::find($tournamentModel);
<<<<<<< HEAD
        $joining_participants = TeamParticipant::where('tournament_model_id', $tournamentModel)->where('status','JOINING')->get();
        //dd($joining_participants);
        $participants = TeamParticipant::where('tournament_model_id', $tournamentModel)->where('status','ACCEPTED')->get();
        return view('templates.host.tournament.tournament_view',compact('tournament', 'participants', 'joining_participants'));
=======
        $joining_participants = TeamParticipant::where('tournament_model_id', $tournamentModel)->where('status', 'JOINING')->get();
        //dd($joining_participants);
        $participants = TeamParticipant::where('tournament_model_id', $tournamentModel)->where('status', 'ACCEPTED')->get();
        return view('templates.host.tournament.tournament_view', compact('tournament', 'participants', 'joining_participants'));
>>>>>>> dev/MC-revisions
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function edit($tournamentModel)
    {
        //
        $tournament = TournamentModel::find($tournamentModel);
        return view('templates.host.tournament.tournament_edit', compact('tournament'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $tournamentModel)
    {
        //
        $tournament = TournamentModel::find($tournamentModel);
        $tournament->update($request->all());

        return redirect()->route('tournament.index')->with('success', 'Tournament updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Host\TournamentModel  $tournamentModel
     * @return \Illuminate\Http\Response
     */
    public function destroy($tournamentModel)
    {

        $tournament = TournamentModel::find($tournamentModel);

        if (!empty($tournamentModel)) {
            $tournament->delete();
            return redirect('tournament-management')->with('success', 'The Tournament has been successfully deleted!');
        } else {
            return redirect('tournament-management')->with('error', 'Please try again!');
        }
    }

    public function accept($tournamentModel)
    {
        //
        $tournament = TeamParticipant::find($tournamentModel);
        $tournament->status = 'ACCEPTED';
        $tournament->save();
        return redirect()->back();
    }

    public function updatebracket(Request $request)
    {
        $input = $request->all();

        $results = DB::select('select * from team_brackets where num = ? and tournament_model_id = ?', [$input['num'], $input['tournament_model_id']]);
        if ($results) {
            DB::update("update team_brackets set " . $input['team_col'] . " = '" . $input['team_data'] . "', " . $input['score_col'] . " = '" . $input['score_data'] . "' where num = ? and tournament_model_id = ?", [$input['num'], $input['tournament_model_id']]);
        } else {
            DB::insert("insert into team_brackets (num, tournament_model_id, " . $input['team_col'] . ", " . $input['score_col'] . ") values (?, ?, ?, ?)", [$input['num'], $input['tournament_model_id'], $input['team_data'], $input['score_data']]);
        }

        return response()->json(['result' => 'success', 'title' => 'Success!', 'message' => $input]);
    }

    public function databracket($tournament_model_id)
    {
        //$results = DB::select('select num, team1, team2, score1, score2 from team_brackets where tournament_model_id = ?', [$tournament_model_id]);
        $results = TeamBracket::where('tournament_model_id', $tournament_model_id)
            ->select('num', 'team1', 'team2', 'score1', 'score2')
            ->get();
        return response()->json(['matches' => $results]);
    }

    public function bracket(TournamentModel $tournament)
    {
        return view('templates.host.tournament.bracket')
            ->with('tournament', $tournament);
    }

    public function accept($tournamentModel)
    {
        //
        $tournament = TeamParticipant::find($tournamentModel);
        $tournament->status = 'ACCEPTED';
        $tournament->save();
        return redirect()->back();
    }

    public function updatebracket(Request $request)
    {
        $input = $request->all();
        
        $results = DB::select('select * from team_brackets where num = ? and tournament_model_id = ?', [$input['num'], $input['tournament_model_id']]);
        if($results) {
            DB::update("update team_brackets set ".$input['team_col']." = '".$input['team_data']."', ".$input['score_col']." = '".$input['score_data']."' where num = ? and tournament_model_id = ?", [$input['num'], $input['tournament_model_id']]);    
        }else{
            DB::insert("insert into team_brackets (num, tournament_model_id, ".$input['team_col'].", ".$input['score_col'].") values (?, ?, ?, ?)", [$input['num'], $input['tournament_model_id'], $input['team_data'], $input['score_data']]);
        }

        return response()->json(['result' => 'success', 'title' => 'Success!', 'message'=> $input]);
    }

    public function databracket($tournament_model_id)
    {        
        //$results = DB::select('select num, team1, team2, score1, score2 from team_brackets where tournament_model_id = ?', [$tournament_model_id]);
        $results = TeamBracket::where('tournament_model_id', $tournament_model_id)
            ->select('num', 'team1', 'team2', 'score1', 'score2')
            ->get();
        return response()->json(['matches'=> $results]);
    }
}
