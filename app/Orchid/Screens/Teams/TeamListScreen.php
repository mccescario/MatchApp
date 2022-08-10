<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use App\Models\TeamMember;
use App\Orchid\Layouts\Teams\TeamListLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Support\Color;
use Orchid\Support\Facades\Toast;

class TeamListScreen extends Screen
{
    public $sport;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        $sport_id = Auth::user()->player_profile->sport_id;

        return [
            'sport' => Auth::user()->player_profile->sport,
            'teams' => Team::where('sport_id', $sport_id)->paginate(10),
            'user' => Auth::user(),
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->sport->exists ? $this->sport->name . __(' Teams') : __('Teams');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Create Team'))
                ->icon('plus')
                ->route('teams.teams.create')
                ->canSee(Auth::user()->team() == null),
            Link::make(__('My Team'))
                ->icon('eye')
                ->type(Color::INFO())
                ->route('teams.teams.view', Auth::user()->team() != null ? Auth::user()->team()->id : 0)
                ->canSee(Auth::user()->team() !== null),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        return [
            TeamListLayout::class
        ];
    }

    public function permission(): ?iterable
    {
        return [
            'player'
        ];
    }
}
