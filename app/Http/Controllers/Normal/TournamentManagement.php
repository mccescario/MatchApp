<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Host\TournamentModel;
use Illuminate\Http\Request;
use App\Models\Player\TeamUser;
use App\Models\TeamParticipant;
use Auth;
use DB;

class TournamentManagement extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* $user_teams = TeamUser::select('id')->where('user_id', Auth::id())->get();
        $userteam = array();
        foreach($user_teams as $user_team)
        {
            $userteam[] = $user_team['id'];
        }
        dd(implode(',', $userteam)); */
        //$tournaments = TournamentModel::leftJoin('team_participants', 'team_participants.tournament_model_id','=','tournament_models.id')
        $tournaments = DB::table('tournament_models')
            
            ->select('tournament_models.*')
            ->get();
        //dd($tournaments);
        $teams = TeamUser::where('user_id', Auth::id())
            ->join('teams','teams.id','=','team_user.team_id')
            ->join('users','team_user.user_id','=','users.id')->get();
        
        return view('templates.normal.tournament.tournament_view', compact('tournaments', 'teams'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function join($id)
    {
        //$teams = TeamUser::where('user_id', Auth::id())
        $team_participated = DB::table('team_participants')->where('tournament_model_id', $id)->get();
        //dd($team_participated);
        $teams = DB::table('team_user')
            ->join('teams','teams.id','=','team_user.team_id')
            ->join('users','team_user.user_id','=','users.id')
            ->leftJoin('team_participants', 'team_user.team_id','=','team_participants.team_id')
            ->whereNull('team_participants.tournament_model_id')
            ->select('teams.*')->get();
        //dd($teams);
        $tournament = TournamentModel::find($id);

        return view('templates.normal.tournament.tournament_join',compact('tournament', 'teams'));
    }

    public function joining(Request $request, $id)
    {
        
        TeamParticipant::create($request->all());
        
        return redirect()->route('player-tournament');
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
