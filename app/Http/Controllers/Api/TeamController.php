<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Mail\RecruiteMail;
use App\Models\Course;
use App\Models\Esport;
use App\Models\Host\TournamentModel;
use App\Models\OlympicCategory;
use App\Models\Recruite;
use App\Models\Sport;
use App\Models\Team;
use App\Models\TeamInvitation;
use App\Models\User;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Validator;

use function PHPUnit\Framework\isEmpty;

class TeamController extends Controller
{
    public function teams()
    {
        $teams = Team::with(['team_members'])->get();
        return response()->json($teams, 200);
    }

    public function esport_user_teams($id)
    {
        $user = User::with(['teams' => function ($q) {
            $q->with('EsportCategory');
            $q->where('olympic_category_id', 2);
        }])->where('id', $id)->first();
    
        return response()->json($user->teams, 200);
    }

    public function sport_user_teams($id)
    {
        $user = User::with(['teams' => function ($q) {
            $q->where('olympic_category_id', 1);
        }])->where('id', $id)->first();
        return response()->json($user->teams, 200);
    }

    public function get_team_members($user_id, $olympic_category_id)
    {
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

        
        
        // $myinfo = User::find($user_id);
        if($olympic_category_id == 1){
            $team['player_info'] = $myinfo->sport;
        } else if ($olympic_category_id == 2) {
            $team['player_info'] = $myinfo->esport;
        }

        return response()->json($team, 200);
    }

    public function game_categories()
    {
        $categoriesWithGames = OlympicCategory::with(['esport_categories', 'sport_categories'])->get();
        $categories = $categoriesWithGames->pluck('olympic_category_name');

        $return['categoriesAll'] = $categoriesWithGames;
        $return['categories'] = $categories;
        return response()->json($return, 200);
    }

    public function getGameByCategoryName($olympic_category_name)
    {
        $category = OlympicCategory::where('olympic_category_name', 'LIKE', $olympic_category_name)->first();
        return response()->json($category->games, 200);
    }

    public function getFilters($game_id, $category_id)
    {
        $category = OlympicCategory::find($category_id);
        $course = Course::all()->pluck('course_title');

        $return['courses'] = $course;

        $roles = [];
        if ($category_id == 1) {
            $category = $category->makeVisible(['sport_categories']);
            $game = $category->sport_categories()->find($game_id);

            $roles = $game != null
                ? $game->sport_positions()->where('is_captain', false)->get()->pluck('sport_position_name')
                : null;
        } else if ($category_id == 2) {
            $category = $category->makeVisible(['esport_categories']);
            $game = $category->esport_categories()->find($game_id);

            $roles = $game != null
                ? $game->esport_roles()->where('is_captain', false)->get()->pluck('esport_role_name')
                : null;
        }
        $return['roles'] = $roles;
        return response()->json($return, 200);
    }

    public function filterUser(Request $request)
    {
        $filters = json_decode($request->filters);

        $game_id = $filters->game_id;
        $category_id = $filters->category_id;
        $student_number = $filters->student_number;
        $course = $filters->course;
        $filter_one = $filters->filter_one;
        

        $user = collect();
        if ($category_id == 1) {
            $user = User::with('sport')->whereHas('sport',function(Builder $query) use ($game_id){
                            $query->whereHas('sport_position1',function(Builder $query2) {
                                $query2->where('is_captain',false);
                            });
                            $query->where('sport_category_id',$game_id);
                        })->whereDoesntHave('team_invitations',function(Builder $tinvations){
                            $tinvations->where('status','!=', null);
                        });

            if ($filter_one != null) {
                $user->whereHas('sport.sport_position1',function(Builder $q) use ($filter_one){
                    $q->where('sport_position_name','LIKE',"%$filter_one%");
                });
            }
    
            // if($filter_two != null){
            //     $user->whereHas('sport',function(Builder $q) use ($filter_two){
            //         $q->where('sport_height','LIKE',"%$filter_two%");
            //     });
            // }
    
            // if ($filter_three != null) {
            //     $user->whereHas('sport',function(Builder $q) use ($filter_three){
            //         $q->where('sport_weight','LIKE',"%$filter_three%");
            //     });
            // }
        } else {
            $filter_two = $filters->filter_two;
            $filter_three = $filters->filter_three;
            $user = User::with('esport')->whereHas('esport',function(Builder $query) use ($game_id){
                $query->whereHas('esport_role',function(Builder $query2) {
                    $query2->where('is_captain',false);
                });
                $query->where('esport_category_id',$game_id);
            })->whereDoesntHave('team_invitations',function(Builder $tinvations){
                $tinvations->where('status','!=', null);
            });

            if ($filter_one != null) {
                $user->whereHas('esport.esport_role',function(Builder $q) use ($filter_one){
                    $q->where('esport_role_name','LIKE',"%$filter_one%");
                });
            }
    
            if($filter_two != null){
                $user->whereHas('esport',function(Builder $q) use ($filter_two){
                    $q->where('esport_rank','LIKE',"%$filter_two%");
                });
            }
    
            if ($filter_three != null) {
                $user->whereHas('esport',function(Builder $q) use ($filter_three){
                    $q->where('esport_level','LIKE',"%$filter_three%");
                });
            }
        }


        if ($student_number != null) {
            $user->where('student_number', $student_number);
        }

        if ($course != null) {
            $user->where('course', $course);
        }

        

        return response()->json($user->get(), 200);
    }

    public function createTeam(Request $request)
    {
        $rules = [
            'team_name' => ['required', 'string', 'max:255'],
            'game_category' => ['required', 'string', 'max:255'],
            'game_name' => ['required', 'string', 'max:255'],
            'user_id' => ['required', 'string', 'max:255'],
        ];

        $response = ['success' => false];
        $return = [];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else {
            $gameCategory = $request->game_category;
            $cat = $gameCategory . "_categories";
            $category = OlympicCategory::where('olympic_category_name', 'LIKE', $gameCategory)->first();
            $category = $category->makeVisible($cat);
            $games = $category->$cat;

            $gameWherName = $gameCategory . "_category_name";
            $gameName = $request->game_name;
            $game = collect($games)->firstWhere($gameWherName, $gameName);

            $user_id = $request->user_id;
            $user = User::with(['teams' => function ($q) use ($game, $category) {
                $q->where('olympic_category_id', $category->id);
            }])->where('id', $user_id)->first();

            if ($user->teams->isEmpty()) {
                $esport_category_id = $game->id;
                $team = Team::create([
                    'olympic_category_id' => $category->id,
                    'team_game_id' => $esport_category_id,
                    'team_name' => $request->team_name
                ]);

                $team->users()->attach([$user_id]);

                if ($gameCategory == 'esport') {
                    $role = collect($game->esport_roles)->filter(function ($r){
                        return $r->is_captain == true;
                    })->first();

                    if($user->esport == null){
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
                    
                    if($user->sport == null){
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

                $user = $user->refresh();
                $information = $gameCategory == 'sport' ? $user->sport : $user->esport;

                $data = [
                    'category_id' => $category->id,
                    'team_id' => $team->id,
                    'game_id' => $game->id,
                    'information' => $information
                ];

                $response['success'] = true;
                $response['has_team'] = false;
                $response['has_error'] = false;
                $response['data'] = $data;
                $return = response()->json($response, 200);
            } else {
                $response['success'] = false;
                $response['has_team'] = true;
                $response['has_error'] = false;
                $response['message'] = "You already have " . ucfirst($gameCategory) . " team";
                $return = response()->json($response, 422);
            }
        }

        return $return;
    }

    public function recruiteMember(Request $request)
    {
        $memberId = $request->member_id;
        $coachId = $request->user_id;
        $message = $request->recruite_message;
        $teamId = $request->team_id;
        $categoryId = $request->category_id;
        
        $user = TeamInvitation::whereHas('team',function(Builder $team) use ($teamId,$categoryId){
            $team->where('olympic_category_id',$categoryId)->where('id',$teamId);
        })->where('user_id',$memberId)->first();

        $return = [];

        if(!$user){
            $teamInvitation = new TeamInvitation();
            $teamInvitation->user_id = $memberId;
            $teamInvitation->team_id = $teamId;
            $teamInvitation->recruite_message = $message;
            $teamInvitation->created_at = now();
            $teamInvitation->updated_at = now();

            $team_invitation_save = $teamInvitation->save();

            if($team_invitation_save){
                $memberInfo = User::find($memberId);
                $coachInfo = User::find($coachId);
                $teamInfo = Team::find($teamId);

                $data['success'] = true;
                
                $emailData = collect([]);
                $emailData->has_message = !empty($message) || $message != null ? true : false;
                $emailData->message = $message;
                $emailData->team_name = $teamInfo->team_name;
                $emailData->game = $teamInfo->game;
                $emailData->coach_name = $coachInfo->fullname;
                $emailData->is_invite = true;

                $this->sendRecruiteMail($memberInfo->email,$emailData);
                $return = response()->json($data, 200);
            } else {
                $data['success'] = false;
                $return = response()->json($data, 500);
            }
        } else {
            $data['success'] = false;
            $data['message'] = "You already sent invitation to this player";
            $return = response()->json($data, 422);
        }
        

        return $return;
    }

    public function sendRecruiteMail($email,$data)
    {
        Mail::to($email)->send(new RecruiteMail($data));
    }

    public function invitations($user_id,$category_id)
    {
        // $invites = User::with(['team_invitations' => function($q) use ($category_id){
        //     $q->with(['team'])->whereHas('team',function($q2) use ($category_id){
        //         $q2->where('olympic_category_id',$category_id);
        //     });
        // }])->where('id',$user_id)->get();
        $invites = TeamInvitation::with(['team'])->wherehas('team',function($q) use ($category_id){
            $q->where('olympic_category_id',$category_id);
        })->where('user_id',$user_id)->where('status',null)->get();

        return response()->json($invites, 200);
    }

    public function invitationsCategory()
    {
        $categoriesWithGames = OlympicCategory::all();
        $categoriesWithGames->makeHidden(['games']);
        return response()->json($categoriesWithGames, 200);
    }

    public function inviteResponse(Request $request)
    {
        $status = $request->status == 1 ? 1 : 2;
        $invite_message = $request->invite_message;
        $category_id = $request->category_id;

        $team_invitation = TeamInvitation::find($request->invitation_id);
        $team_invitation->status = $status;
        $team_invitation->invite_message = $invite_message;
        $team_invitation_save = $team_invitation->save();

        $team_id = $team_invitation->team_id;

        $return = [];

        if($team_invitation_save){
            $team = Team::find($team_id);
            $team->users()->attach([$team_invitation->user_id]);
            $data['success'] = true;

            $member = User::find($team_invitation->id);

            $cat = $category_id == 1 ? 'sport' : 'esport';
            $roleModel = $category_id == 1 ? 'sport_position1' : 'esport_role';

            $coachInfo = User::whereHas('teams',function($t) use ($team){
                $t->where('teams.id',$team->id);
            })->get()->filter(function ($item) use ($cat,$roleModel){
                return $item->$cat->$roleModel->is_captain == true;
            })->first();

            $emailData = collect([]);
            $emailData->has_message = !empty($invite_message) || $invite_message != null ? true : false;
            $emailData->message = $invite_message;
            $emailData->team_name = $team->team_name;
            $emailData->game = $team->game;
            $emailData->member_name = $member->fullname;
            $emailData->is_invite = false;
            $emailData->status = $status;

            $this->sendRecruiteMail($coachInfo->email,$emailData);
            
            $return = response()->json($data, 200);
        } else {
            $data['success'] = false;
            $return = response()->json($data, 200);
        }

        return $return;
    }

    public function tournament_bracket(TournamentModel $tournament)
    {
        return view('api.bracket')
            ->with('tournament', $tournament);
    }
}
