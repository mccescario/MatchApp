<?php

namespace App\Orchid\Screens\Teams;

use App\Models\Team;
use Orchid\Screen\Screen;
use Orchid\Screen\Sight;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class TeamProfileScreen extends Screen
{
    public $team;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Team $team): iterable
    {
        return [
            'team' => $team,
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return __('Team: ') . $this->team->name . __(' Profile');
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
            Layout::legend('team', [
                Sight::make('name'),
                Sight::make('sport.name', 'Sport')
                    ->render(function (Team $team) {
                        return $team->sport->name;
                    }),
                Sight::make('Matches Winned')
                    ->render(function (Team $team) {
                        return $team->win_count;
                    })
            ])
        ];
    }
}
