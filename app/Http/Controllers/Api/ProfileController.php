<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Esport;
use App\Models\EsportCategory;
use App\Models\EsportRole;
use App\Models\OlympicCategory;
use App\Models\Sport;
use App\Models\SportCategory;
use App\Models\SportPosition;
use App\Models\User;
use App\Rules\MatchOldPasswordRule;
use App\Rules\SportSecondaryPositionRule;
use Cviebrock\EloquentSluggable\Services\SlugService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    public function update(Request $request,$id)
    {
        $rules = [
            'username' => ['nullable','string', 'max:20'],
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required','string', 'max:255'],
            'age' => ['required','string'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($id)],
            'student_number' => ['string', 'nullable',Rule::unique('users')->ignore($id)],
            'course' => ['nullable','string']
        ];

        $response = ['success' => false,'has_changes' => false];
        $return = [];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else{
            $user = User::find($id);
            $user->fill($request->all());

            $response['success'] = true;
            if($user->isDirty()){
                $user->save();
                $response['has_changes'] = true;
                $response['message'] = "Profile information updated successfully.";
                $response['user'] = $user;
                $return = response()->json($response, 200);
            } else {
                $response['message'] = "No changes has been made.";
                $return = response()->json($response, 200);
            }
        }

        return $return;
    }

    public function getCourses()
    {
        return response()->json(Course::get()->pluck('course_title'), 200);

    }

    public function getEsportsCategories()
    {
        $esport = EsportCategory::with('esport_roles')->get();
        
        return response()->json($esport, 200);
    }

    public function getSportsCategories()
    {
        $sport = SportCategory::with('sport_positions')->get();
        return response()->json($sport, 200);
    }

    public function updatePlayerProfile(Request $request, $id)
    {
        $player = User::find($id);
        $player->esport->update([
            'esport_name' => $request->esport_name,
            'esport_ign' => $request->esport_ign,
            'esport_level' => $request->esport_level,
            'esport_rank' => $request->esport_rank,
            'esport_role' => $request->esport_role,
            'esport_win_rate' => $request->esport_win_rate,
        ]);

        $player->sport->update([
            'sport_name' => $request->sport_name,
            'sport_height' => $request->sport_name,
            'sport_weight' => $request->sport_name,
            'sport_primary_position' => $request->sport_name,
            'sport_secondary_position' => $request->sport_name
        ]);

        return response()->json(['success' => true], 200);
    }

    public function changePassword(Request $request)
    {
        $user = User::find($request->user_id);

        $rules = [
            'old_password' => ['required','string',new MatchOldPasswordRule($user), 'max:20','min:8'],
            'new_password' => ['required', 'string','confirmed', 'max:20','min:8'],
            'new_password_confirmation' => ['required','string', 'max:20','min:8'],
        ];

        $response = ['success' => false];
        $return = [];

        $validator = Validator::make($request->all(), $rules);
        
        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else {
            $response['success'] = true;
            $user->fill([
                'password' => Hash::make($request->new_password)
            ]);
            $user->save();

            $return = response()->json($response, 200);
        } 

        return $return;
    }

    public function updatePlayerProfileFields($user_id,$olympic_category_id)
    {
        $player_info = User::find($user_id);
        $player_info = $olympic_category_id == 1 ? $player_info->sport : $player_info->esport;
        $data = [];

        if($player_info == null){
            $olympics = OlympicCategory::where('id',$olympic_category_id)->get()->each(function($olympic){
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
            $olympics->makeHidden(['games']);
    
            $data['olympics'] = $olympics->first();
        } else {
            if($olympic_category_id == 1){
                $positions = SportPosition::where('sport_category_id',$player_info->sport_category_id)->where('id','!=',$player_info->sport_primary_position_id)->where('is_captain',0)->get();
                $data['positions'] = $positions;
            } else if($olympic_category_id == 2){
                $roles = EsportRole::where('esport_category_id',$player_info->esport_category_id)->where('is_captain',0)->get();
                $data['roles'] = $roles;
            }
        }

        $data['player_profile'] = $player_info;
        return response()->json($data, 200);
    }

    public function insertOrUpdateNewUserSport(Request $request)
    {
        $rules = array();
        $is_new = $request->is_new;
        $id = $request->user_id;
        $user = User::find($id);

        if($is_new){
            $rules = [
                'sport_category_id' => ['required','numeric'],
                'sport_height' => ['nullable','numeric'],
                'sport_weight' => ['nullable','numeric'],
                'sport_primary_position_id' => ['required'],
                'sport_secondary_position_id' => ['different:sport_primary_position_id']
            ];
        } else {
            $rules = [
                'sport_height' => ['nullable','numeric'],
                'sport_weight' => ['nullable','numeric'],
                'sport_secondary_position_id' => [new SportSecondaryPositionRule($user)]
            ];
        }
        

        $response = ['success' => false,'has_changes' => false];
        $return = [];

        $attributes = array(
            'sport_category_id' => 'game',
            'sport_primary_position_id' => 'primary position',
            'sport_secondary_position_id' => 'secondary position'
        );
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($attributes);

        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else{
            $response['success'] = true;
            if($is_new){
                $user->sport()->create($request->all());
                $response['has_changes'] = true;
                $response['message'] = "Player information created successfully.";
                $response['sport_information'] = $user->sport;
                $return = response()->json($response, 200);
                
            } else {
                $sport = Sport::where('user_id',$id)->first();
                $sport->fill([
                    'sport_secondary_position_id' => $request->sport_secondary_position_id,
                    'sport_height' => $request->sport_height,
                    'sport_weight' => $request->sport_weight
                ]);
                if($sport->isDirty()){
                    $sport->save();
                    $response['has_changes'] = true;
                    $response['message'] = "Player information updated successfully.";
                    $response['sport_information'] = $user->sport;
                    $return = response()->json($response, 200);
                } else {
                    $response['message'] = "No changes has been made.";
                    $return = response()->json($response, 200);
                }
            }
        }

        return $return;
    }

    public function insertOrUpdateNewUserEsport(Request $request)
    {
        $response = ['success' => false,'has_changes' => false];
        $return = [];
        $rules = array();
        $is_new = $request->is_new;
        $id = $request->user_id;
        $user = User::find($id);

        if($is_new){
            $rules = [
                'esport_category_id' => ['required','numeric'],
                'esport_role_id' => ['required','numeric'],
                'esport_ign' => ['nullable','string'],
                'esport_level' => ['nullable','numeric'],
                'esport_rank' => ['nullable','string'],
                'esport_win_rate' => ['nullable','numeric']
            ];
        } else {
            $rules = [
                'esport_ign' => ['nullable','string'],
                'esport_level' => ['nullable','numeric'],
                'esport_rank' => ['nullable','string'],
                'esport_win_rate' => ['nullable','numeric']
            ];
        }

        $attributes = array(
            'esport_category_id' => 'game',
            'esport_role_id' => 'role'
        );
        $validator = Validator::make($request->all(), $rules);
        $validator->setAttributeNames($attributes);

        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else {
            $response['success'] = true;
            if($is_new){
                $user->esport()->create($request->all());
                $response['has_changes'] = true;
                $response['message'] = "Player information created successfully.";
                $response['esport_information'] = $user->esport;
                $return = response()->json($response, 200);
            } else {
                $esport = Esport::where('user_id',$id)->first();
                $esport->fill([
                    'esport_ign' => $request->esport_ign,
                    'esport_level' => $request->esport_level,
                    'esport_rank' => $request->esport_rank,
                    'esport_win_rate' => $request->esport_win_rate
                ]);
                if($esport->isDirty()){
                    $esport->save();
                    $response['has_changes'] = true;
                    $response['message'] = "Player information updated successfully.";
                    $response['esport_information'] = $user->esport;
                    $return = response()->json($response, 200);
                } else {
                    $response['message'] = "No changes has been made.";
                    $return = response()->json($response, 200);
                }
            }
        }

        return $return;
    }

    public function updateProfilePhoto(Request $request)
    {
        $rules = [
            'profile_photo_path' => ['mimes:png,jpg','max:5048']
        ];

        $response = ['success' => false];
        $return = [];

        $validator = Validator::make($request->all(), $rules);

        if($validator->fails()){
            $errors = $validator->errors();
            $response['errors'] = $errors;
            $return = response()->json($response, 422);
        } else {
            if($request->has('profile_photo_path')){
                $newImageName = uniqid().'-'.now()->timestamp.'.'.$request->profile_photo_path->extension();
        
                $request->profile_photo_path->move(public_path('images'), $newImageName);
    
                $data = [
                    'profile_photo_path' => $newImageName
                ];
    
                $user = User::find($request->id);
                $user->fill($data);
                $user->save();
                $response['success'] = true;
                $response['user'] = $user->only(['profile_photo_path']);
                $return = response()->json($response, 200);
            }
        }

        return $return;
    }
}
