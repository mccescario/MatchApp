<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\Sport;
use App\Models\SportCategory;
use App\Models\Team;
use App\Models\User;
use Illuminate\Http\Request;

class ResourcesController extends Controller
{
    public function courses()
    {
        return response()->json(Course::all());
    }

    public function sport_categories()
    {
        return response()->json(SportCategory::all());
    }

    public function sports()
    {
        return response()->json(Sport::with(['category', 'roles'])->get());
    }

    public function sports_by_category(SportCategory $sportCategory)
    {
        return response()->json($sportCategory->sports);
    }

    public function teams()
    {
        return response()->json(Team::with('members', 'members.member')->get());
    }

    public function team($id)
    {
        $team = Team::with('members', 'members.member')->findOrFail($id);

        return response()->json($team);
    }

    public function user_filter(Request $request)
    {
        $users = User::has('player_profile')->with('player_profile', 'player_profile.sport', 'player_profile.sport_role');

        if ($request->has('sport_id')) {
            $users->whereRelation('player_profile', 'sport_id', $request->query('sport_id'));
        }

        if ($request->has('course_id')) {
            $users->whereRelation('player_profile', 'course_id', $request->query('course_id'));
        }

        if ($request->has('sport_role_id')) {
            $users->whereRelation('player_profile', 'sport_role_id', $request->query('sport_role_id'));
        }

        return response()->json($users->get());
    }
}
