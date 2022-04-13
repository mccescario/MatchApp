<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Http\Helpers\Bracket\Visualizer;
use App\Models\Host\TournamentModel;
use Illuminate\Http\Request;
use App\Models\Player\TeamUser;
use App\Models\TeamParticipant;
use App\Models\TournamentMatch;
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
            ->join('teams', 'teams.id', '=', 'team_user.team_id')
            ->join('users', 'team_user.user_id', '=', 'users.id')->get();

        return view('templates.normal.tournament.tournament_view', compact('tournaments', 'teams'))
            ->with('i', (request()->input('page', 1) - 1) * 5);
    }

    public function join($id)
    {
        //$teams = TeamUser::where('user_id', Auth::id())
        $team_participated = DB::table('team_participants')->where('tournament_model_id', $id)->get();
        //dd($team_participated);
        $teams = DB::table('team_user')
            ->join('teams', 'teams.id', '=', 'team_user.team_id')
            ->join('users', 'team_user.user_id', '=', 'users.id')
            ->leftJoin('team_participants', 'team_user.team_id', '=', 'team_participants.team_id')
            ->whereNull('team_participants.tournament_model_id')
            ->select('teams.*')->get();
        //dd($teams);
        $tournament = TournamentModel::find($id);

        return view('templates.normal.tournament.tournament_join', compact('tournament', 'teams'));
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
    public function show(TournamentModel $tournamentModel)
    {
        $latestCurrent = $tournamentModel->matches()->where('is_current', true)->orderBy('updated_at')->first();

        $tournament_size = 0;

        switch ($tournamentModel->tournament_size) {
            case 2:
                $tournament_size = 4;
                break;
            case 3:
                $tournament_size = 8;
                break;
            case 4:
                $tournament_size = 16;
                break;
        }

        $settings  = array('image' => false, 'bronze' => false, 'nobronze' => false);

        $matches = $tournamentModel->matches;

        $raw_matches = array();
        $teams_1 = array();
        $teams_2 = array();

        foreach ($matches as $item) {
            $teams_1['name'] =  $item->team_one_name;
            $teams_1['score'] = $item->team_1_score;
            $teams_2['name'] =  $item->team_two_name;
            $teams_2['score'] = $item->team_2_score;

            $raw_matches[] = $teams_1;
            $raw_matches[] = $teams_2;
        }

        $brackets = new Visualizer($raw_matches, $settings, $tournament_size);
        $bracket = $brackets->RenderFromData();

        return view('templates.normal.tournament.status')
            ->with('tournament', $tournamentModel)
            ->with('bracket', $bracket)
            ->with('latestCurrent', $latestCurrent);
    }

    public function showMatch(TournamentModel $tournamentModel, TournamentMatch $tournamentMatch)
    {
        // dd($tournamentMatch);

        return view('templates.normal.tournament.match')
            ->with('match', $tournamentMatch);
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
