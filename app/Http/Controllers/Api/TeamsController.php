<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Team;
use App\Models\TeamMember;
use App\Models\User;
use Illuminate\Http\Request;

class TeamsController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'user_id' => 'integer',
            'team_name' => 'required|string|max:255'
        ]);

        $user = User::findOrFail($request->user_id);

        if ($user->team() != null) {
            return response()->json([
                'message' => 'You already have a team',
                'success' => false
            ], 422);
        }

        $team = Team::create([
            'sport_id' => $user->player_profile->sport_id,
            'owner_id' => $request->user_id,
            'name' => $request->team_name,
        ]);

        TeamMember::create([
            'team_id' => $team->id,
            'member_id' => $request->user_id,
            'status' => 'owner',
        ]);

        return response()->json([
            'success' => true
        ]);
    }

    public function invite(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer',
            'team_id' => 'required|integer',
            'invitee_id' => 'required|integer',
        ]);

        $team = Team::findOrFail($request->team_id);
        $user = User::findOrFail($request->user_id);

        if ($team->owner_id != $user->id) {
            return response()->json([
                'message' => 'You do not own the team',
            ], 403);
        }

        $invitee = User::findOrFail($request->invitee_id);

        if ($invitee->team() != null) {
            return response()->json([
                'message' => 'Player already belongs in a Team',
            ], 422);
        }

        $membership = TeamMember::firstOrCreate([
            'member_id' => $invitee->id,
            'team_id' => $team->id
        ]);

        $membership->status = TeamMember::INVITE_PENDING;
        $membership->save();

        return response()->json([
            'message' => 'Player Invited',
        ]);
    }

    public  function invitations(Request $request)
    {
        $request->validate([
            'user_id' => 'required|integer'
        ]);

        return response()->json(TeamMember::with('team', 'member')->where('status', TeamMember::INVITE_PENDING)->where('member_id', $request->user_id)->get());
    }

    public function invite_response(Request $request)
    {
        $request->validate([
            'invite_id' => 'required|integer',
            'user_id' => 'required|integer',
            'status' => 'required'
        ]);

        $membership = TeamMember::findOrFail($request->invite_id);

        if ($membership->member_id != $request->user_id) {
            return response()->json([
                'message' => 'You do not own the invitation',
                'success' => false,
            ], 403);
        }

        if ($membership->status != TeamMember::INVITE_PENDING) {
            return response([
                'message' => 'Invalid Invitation',
                'success' => false
            ], 422);
        }

        if ($request->status == 'accept') {
            $membership->update([
                'status' => TeamMember::APPROVED,
            ]);

            return response([
                'message' => 'Invite Accepted',
                'success' => true
            ]);
        }

        if ($request->status == 'reject') {
            $membership->update([
                'status' => TeamMember::INVITE_REJECTED,
            ]);

            return response([
                'message' => 'Invite Rejected',
                'success' => true
            ]);
        }

        return response([
            'message' => 'Action not allowed',
            'success' => false
        ], 422);
    }
}
