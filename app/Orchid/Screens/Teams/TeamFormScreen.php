<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use App\Models\TeamMember;
use App\Orchid\Layouts\Teams\TeamFormLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Screen;
use Orchid\Support\Facades\Toast;

class TeamFormScreen extends Screen
{
    public $team;
    public $sport;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Team $team): iterable
    {
        return [
            'team' => $team,
            'sport' => Auth::user()->player_profile->sport,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->team->exists ? $this->team->name : __('Create ') . $this->sport->name . __(' Team');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            TeamFormLayout::class
        ];
    }

    public function createOrUpdateTeam(Request $request)
    {
        // dd($request->all());
        if (Auth::user()->team() !== null) {
            Toast::error('You already have a team');

            return redirect()->route('teams.teams.list');
        }

        $request->validate([
            'team.name' => 'required|max:255',
        ]);

        $user_id = Auth::user()->id;

        $team = Team::create([
            'sport_id' => $request->sport_id,
            'owner_id' => $user_id,
            'name' => $request->get('team')['name'],
        ]);

        TeamMember::create([
            'team_id' => $team->id,
            'member_id' => $user_id,
            'status' => 'owner',
        ]);

        Toast::info('Team Created');

        return redirect()->route('teams.teams.list');
    }

    public function permission(): ?iterable
    {
        return [
            'player'
        ];
    }
}
