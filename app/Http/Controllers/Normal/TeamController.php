<?php

namespace App\Http\Controllers\Normal;

use App\Http\Controllers\Controller;
use App\Models\OlympicCategory;
use App\Models\Player\TeamModel;
use App\Models\Player\TeamMembers;
use App\Models\Player\TeamUser;
use App\Models\TeamInvitation;
use App\Models\Player\PlayerProfile;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;
use Auth;
use DB;

class TeamController extends Controller
{
    //
    public function index()
    {
        $user = Auth::id();
        //$teams = TeamUser::where('user_id', Auth::id())
        $teams = DB::table('team_user')->where('user_id', Auth::id())
            ->join('teams','teams.id','=','team_user.team_id')
            ->join('users','team_user.user_id','=','users.id')
            ->leftJoin('team_participants', 'team_user.team_id','=','team_participants.team_id')
            ->leftJoin('tournament_models', 'tournament_models.id','=','team_participants.tournament_model_id')
            ->select('team_user.*', 'teams.*', 'users.*', 'tournament_models.tournament_name', 'team_participants.status')
            ->get();

        $olympics = OlympicCategory::all()->each(function($olympic){
            $olympic->makeVisible(['sport_categories','esport_categories']);
            if($olympic->sport_categories->count() != 0){
                $olympic->sport_categories->each(function($sport){
                    $sport->sport_positions;
                });
            } else {
                unset($olympic->sport_categories);
            }
    
            if($olympic->esport_categories->count() != 0){
                $olympic->esport_categories->each(function($esport){
                    $esport->esport_roles;
                });
            } else {
                unset($olympic->esport_categories);
            }
        });
        
        $data['olympics'] = $olympics;

        return view('templates.normal.team.team',$data,compact('teams'));
    }

    public function show($id)
    {
        $team = Team::find($id);
        $users = User::get();
        return view('templates.normal.team.team_member',compact('team', 'users'));
    }

    public function store(Request $request)
    {
        // $result = TeamModel::create($request->all());
        // DB::insert("insert into team_user (team_id, user_id, created_at, updated_at) values (?, ?, ?, ?)", [$result->id, Auth::id(), date('Y-m-d H:i:s'), date('Y-m-d H:i:s')]);
        $team = Team::create($request->all());

        $team->users()->attach([Auth::id()]);
        return redirect()->route('team')
                        ->with('success','New team has been created successfully.');
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
        $team_invites = TeamInvitation::where('user_id', Auth::id())->get();
        
        return view('templates.normal.team.team_invites',compact('team_invites'));
    }

    public function team_manage($id)
    {
        $i = 0;
        $user = User::find($id);
        $team = TeamModel::find($user->team);
        $members = TeamMembers:://where('team_id','=',$user->team)
                    join('users','users.team','=','team_members.team_id')
                    //->('sport_profile','sport_profile.id','=','team_members.sport_profile_id')
                    ->get([/*'sport_profile.ign','sport_profile.position',*/'users.name']);

        return view('templates.normal.team',compact('team','members','i','user'));
    }

    public function member_view($id)
    {
        $user = User::find($id);
        return view('templates.normal.team.player_profile',compact('user'));
    }
}
