<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Esport;
use App\Models\EsportCategory;
use App\Models\SportCategory;
use App\Models\User;
use Illuminate\Http\Request;
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
        
    }
}
