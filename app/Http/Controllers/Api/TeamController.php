<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\OlympicCategory;
use App\Models\Team;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Team::with(['team_members'])->get();
        return response()->json($teams, 200);
    }

    public function esport_user_teams($id)
    {
        $user = User::with(['teams' => function($q){
            $q->where('olympic_category_id',2);
        }])->where('id',$id)->first();
        return response()->json($user->teams, 200);
    }

    public function sport_user_teams($id)
    {
        $user = User::with(['teams' => function($q){
            $q->where('olympic_category_id',1);
        }])->where('id',$id)->first();
        return response()->json($user->teams, 200);
    }

    public function get_team_members($team_id,$user_id,$olympic_category_id)
    {
        $team = Team::with(['users' => function($q) use ($user_id,$olympic_category_id){
            $with = $olympic_category_id == 2 ? 'esport': 'sport';
            $q->with($with);
            $q->where('users.id','!=',$user_id);
        }])->where('id',$team_id)->first();

        $members = collect([]);
        $team->users->map(function($data) use ($members,$olympic_category_id){
            $push = [
                'real_firstname' => $data->firstname,
                'real_lastname' => $data->lastname
            ];
            $userOlympic = $olympic_category_id == 2 ? $data->esport : $data->sport;
            $appendNames = collect($userOlympic)->merge(collect($push));
            $members->push($appendNames);
        });

        $team = collect($team)->except('users')->put('team_members',$members);

        return response()->json($team, 200);
    }

    public function game_categories()
    {
        $categories = OlympicCategory::all()->pluck('olympic_category_name');
        return response()->json($categories, 200);
    }

    public function getGameByCategory($olympic_category_name)
    {
        $category = OlympicCategory::where('olympic_category_name','LIKE',$olympic_category_name)->first();
        return response()->json($category->games, 200);
    }

    public function createTeam(Request $request)
    {
        $rules = [
            'team_name' => ['nullable','string', 'max:20'],
            'game_category' => ['required', 'string', 'max:255'],
            'game_name' => ['required','string', 'max:255'],
            'user_id' => ['required','string', 'max:255'],
        ];

        $response = ['success' => false];
        $return = [];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else{
            $gameCategory = $request->game_category;
            $cat = $gameCategory."_categories";
            $category = OlympicCategory::where('olympic_category_name','LIKE',$gameCategory)->first();
            $category = $category->makeVisible($cat);
            $games = $category->$cat;

            $gameWherName = $gameCategory."_category_name";
            $gameName = $request->game_name;
            $game = collect($games)->firstWhere($gameWherName,$gameName);
            
            $team = Team::create([
                'olympic_category_id' => $category->id,
                'team_game_id' => $game->id,
                'team_name' => $request->team_name
            ]);

            $freshTeam = $team->fresh();

            $freshTeam->users()->attach([$request->user_id]);

            $response['success'] = true;

            $return = response()->json($response, 200);
        }

        return $return;
    }
}
