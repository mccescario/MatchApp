<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Host\TournamentModel;
use App\Models\Team;
use App\Models\TeamParticipant;
use App\Models\TournamentMatch;
use App\Models\User;
use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function tournament_list()
    {
        return response()->json(TournamentModel::all(), 200);
    }

    public function join_tournament(Request $request)
    {
        $user_id = $request->user_id;
        $tournament_id = $request->tournament_id;
        $tournament = TournamentModel::find($tournament_id);
        $olympic_category_id = $tournament->tournament_sport_type;

        $myinfo = [];

        if($olympic_category_id == 1){
            $myinfo = User::with(['teams' => function ($q) use ($olympic_category_id){
                $q->with('SportCategory');
                $q->where('olympic_category_id', $olympic_category_id);
            }])->where('id', $user_id)->first();
        } else if ($olympic_category_id == 2){
            $myinfo = User::with(['teams' => function ($q) use ($olympic_category_id){
                $q->with('EsportCategory');
                $q->where('olympic_category_id', $olympic_category_id);
            }])->where('id', $user_id)->first();
        }

        $team = ['has_team' => false];

        if(!$myinfo->teams->isEmpty()){
            $team = Team::with(['users' => function ($q) use ($user_id, $olympic_category_id) {
                $with = $olympic_category_id == 2 ? 'esport' : 'sport';
                $q->with($with);
                $q->where('users.id', '!=', $user_id);
            }])->where('id', $myinfo->teams->first()->id)->first();
    
            $members = collect([]);
            $team->users->map(function ($data) use ($members, $olympic_category_id) {
                $push = [
                    'real_firstname' => $data->firstname,
                    'real_lastname' => $data->lastname
                ];
                $userOlympic = $olympic_category_id == 2 ? $data->esport : $data->sport;
                $appendNames = collect($userOlympic)->merge(collect($push));
                $members->push($appendNames);
            });

            $team = collect($team)->except('users')->put('team_members', $members);
            $team['has_team'] = true;
        }

        if($olympic_category_id == 1){
            $team['player_info'] = $myinfo->sport;
        } else if ($olympic_category_id == 2) {
            $team['player_info'] = $myinfo->esport;
        }

        $response = ['success' => false];
        if(!$team['has_team']){
            $response['message'] = 'You don\'t have a team for this tournament.';
        } else {
            // if($olympic_category_id == 1 && $team['game_id'] == $tournament->tournament_sport){
                    
            // } else if ($olympic_category_id == 2 && $team['game_id'] == $tournament->tournament_esport) {
                
            // }
            $player_info = $team['player_info'];
            if($player_info->is_captain){
                $participants = TeamParticipant::where('team_id',$team['id']);
                if(!$participants->exists()){
                    $response['success'] = true;
                    $response['message'] = 'Tournament register successful.';
                    $response['participants'] = $participants;
                    TeamParticipant::create([
                        'tournament_model_id' => $tournament_id,
                        'team_id' => $team['id'],
                        'status' => 'JOINING'
                    ]);
                } else {
                    $response['message'] = 'Your team already joined to a tournament.';
                }
            } else{
                $response['message'] = 'You need to be a captain to join tournament.';
            }
        }

        return response()->json($response, 200);
    }

    public function tournament_teams($id)
    {
        $teams = TournamentMatch::where('tournament_id',$id)->where(function($query){
            $query->where('team_1_id','!=',null)->orWhere('team_2_id','!=',null);
        })->get();

        return response()->json($teams, 200);
    }
}
