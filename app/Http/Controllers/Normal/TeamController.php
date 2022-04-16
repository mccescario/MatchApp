<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\Esport;
use App\Models\OlympicCategory;
use App\Models\Player\TeamModel;
use App\Models\Player\TeamMembers;
use App\Models\Player\TeamUser;
use App\Models\TeamInvitation;
use App\Models\Player\PlayerProfile;
use App\Models\Sport;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;
use Illuminate\Database\Eloquent\Builder;

class TeamController extends Controller
{
    //
    public function index()
    {
        // $user = Auth::id();
        // //$teams = TeamUser::where('user_id', Auth::id())
        // $teams = DB::table('team_user')->where('user_id', Auth::id())
        //     ->join('teams','teams.id','=','team_user.team_id')
        //     ->join('users','team_user.user_id','=','users.id')
        //     ->leftJoin('team_participants', 'team_user.team_id','=','team_participants.team_id')
        //     ->leftJoin('tournament_models', 'tournament_models.id','=','team_participants.tournament_model_id')
        //     ->select('team_user.*', 'teams.*', 'users.*', 'tournament_models.tournament_name', 'team_participants.status')
        //     ->get();

        // $olympics = OlympicCategory::all()->each(function($olympic){
        //     $olympic->makeVisible(['sport_categories','esport_categories']);
        //     if($olympic->sport_categories->count() != 0){
        //         $olympic->sport_categories->each(function($sport){
        //             $sport->sport_positions;
        //         });
        //     } else {
        //         unset($olympic->sport_categories);
        //     }
        //     if($olympic->esport_categories->count() != 0){
        //         $olympic->esport_categories->each(function($esport){
        //             $esport->esport_roles;
        //         });
        //     } else {
        //         unset($olympic->esport_categories);
        //     }
        // });

        // $data['olympics'] = $olympics;

        // return view('templates.normal.team.team',$data,compact('teams'));

        $sport_team = Team::with(['users' => function ($q) {
            $q->whereHas('sport.sport_position1', function (Builder $q1) {
                $q1->where('is_captain', 1);
            });
        }])->whereHas('users', function ($q) {
            $q->where('users.id', Auth::id());
        })->where('olympic_category_id', 1)->withCount('users')->get();

        $esport_team = Team::with(['users' => function ($q) {
            $q->whereHas('esport.esport_role', function (Builder $q1) {
                $q1->where('is_captain', 1);
            });
        }])->whereHas('users', function ($q) {
            $q->where('users.id', Auth::id());
        })->where('olympic_category_id', 2)->withCount('users')->get();

        $teams = $sport_team->merge($esport_team);

        // echo json_encode($teams);
        // // echo json_encode($teams);
        // die;

        $olympics = OlympicCategory::all()->each(function ($olympic) {
            $olympic->makeVisible(['sport_categories', 'esport_categories']);
            if ($olympic->sport_categories->count() != 0) {
                $olympic->sport_categories->each(function ($sport) {
                    $sport->sport_positions;
                });
            } else {
                unset($olympic->sport_categories);
            }

            if ($olympic->esport_categories->count() != 0) {
                $olympic->esport_categories->each(function ($esport) {
                    $esport->esport_roles;
                });
            } else {
                unset($olympic->esport_categories);
            }
        });

        $data['olympics'] = $olympics;

        return view('templates.normal.team.team', $data, compact('teams'));
    }

    public function show($id)
    {
        $team = Team::find($id);
        $users = User::get();
        return view('templates.normal.team.team_member', compact('team', 'users'));
    }

    public function store(Request $request)
    {
        // $result = TeamModel::create($request->all());
        // DB::insert("insert into team_user (team_id, user_id, created_at, updated_at) values (?, ?, ?, ?)", [$result->id, Auth::id(), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        // $team = Team::create($request->all());

        // $team->users()->attach([Auth::id()]);

        $categoryId = $request->olympic_category_id;
        $category = OlympicCategory::where('id', $categoryId)->first();
        $game = [];
        $teamGameId = $request->team_game_id;
        $message = '';
        $response = [];

        if ($categoryId == 1) {
            $category = $category->makeVisible('sport_categories');
            $game = collect($category->sport_categories)->firstWhere('id', $teamGameId);
        } else if ($categoryId == 2) {
            $category = $category->makeVisible('esport_categories');
            $game = collect($category->esport_categories)->firstWhere('id', $teamGameId);
        }

        $user_id = Auth::id();
        $user = User::with(['teams' => function ($q) use ($game, $category) {
            $q->where('olympic_category_id', $category->id);
        }])->where('id', $user_id)->first();

        $gameCategory = strtolower($category->olympic_category_name);
        if ($user->teams->isEmpty()) {
            $esport_category_id = $game->id;
            $team = Team::create([
                'olympic_category_id' => $category->id,
                'team_game_id' => $esport_category_id,
                'team_name' => $request->team_name
            ]);

            $team->users()->attach([$user_id]);

            if ($gameCategory == 'esport') {
                $role = collect($game->esport_roles)->filter(function ($r) {
                    return $r->is_captain == true;
                })->first();

                if ($user->esport == null) {
                    $esportInstance = Esport::firstOrNew([
                        'esport_role_id' => $role->id,
                        'esport_category_id' => $esport_category_id,
                    ]);

                    $user->esport()->save($esportInstance);
                } else {
                    $user->esport->esport_role_id = $role->id;
                    $user->push();
                }
            } else if ($gameCategory == 'sport') {
                $sport_category_id = $game->id;
                $column = $gameCategory . "_position_name";
                $position = collect($game->sport_positions)->filter(function ($r) use ($column) {
                    return $r->is_captain == true;
                })->first();

                $sportInstance = collect();

                if ($user->sport == null) {
                    $sportInstance = new Sport([
                        'sport_primary_position_id' => $position->id,
                        'sport_category_id' => $sport_category_id,
                    ]);
                    $user->sport()->save($sportInstance);
                } else {
                    $user->sport->sport_primary_position_id = $position->id;
                    $user->push();
                }
            }

            $response['error'] = false;
            $response['message'] = 'New team has been created successfully.';
        } else {
            $response['error'] = true;
            $response['message'] = 'You already have ' . ucfirst($gameCategory) . ' team';
        }


        return redirect()->route('team')
            ->with('response', $response);
    }

    public function add_member(Request $request)
    {
        $result = TeamInvitation::create($request->all());
        //DB::insert("insert into team_user (team_id, user_id, created_at, updated_at) values (?, ?, ?, ?)", [$result->id, Auth::id(), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        //return redirect()->route('team')->with('success','New team has been created successfully.');
        return redirect()->back();
    }

    public function invites($id)
    {
        $team_invites = TeamInvitation::with(['team'])->where('user_id', Auth::id())->where('status', null)->get();
        return view('templates.normal.team.team_invites', compact('team_invites'));
    }

    public function join_invite($id, $respond)
    {
        $team_invite = TeamInvitation::find($id);
        $team_invite->status = $respond;
        $team_invite->save();
        $team_invite->fresh();
        $user_id = $team_invite->user_id;
        $team = Team::find($team_invite->team_id);
        $team->users()->attach([$user_id]);
        return redirect()->route('invites', $user_id);
    }

    public function team_manage($id)
    {
        $i = 0;
        $user = User::find($id);
        $team = TeamModel::find($user->team);
        $members = TeamMembers:: //where('team_id','=',$user->team)
            join('users', 'users.team', '=', 'team_members.team_id')
            //->('sport_profile','sport_profile.id','=','team_members.sport_profile_id')
            ->get([/*'sport_profile.ign','sport_profile.position',*/'users.name']);

        return view('templates.normal.team', compact('team', 'members', 'i', 'user'));
    }

    public function member_view($id)
    {
        $user = User::find($id);
        return view('templates.normal.team.player_profile', compact('user'));
    }

    public function profile(Team $team)
    {
        return view('templates.normal.team-profile')
            ->with('team', $team);
    }
}
