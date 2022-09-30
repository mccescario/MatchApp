<?php

declare(strict_types=1);

namespace App\Orchid\Screens;

use App\Models\Tournament;
use App\Models\TournamentMatch;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;

class PlatformScreen extends Screen
{
    public $matches;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'matches' => TournamentMatch::where('is_current', true)->orderBy('updated_at')->get(),
            'tournaments' => Tournament::has('matches')->get()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Dashboard';
    }

    /**
     * Display header description.
     *
     * @return string|null
     */
    public function description(): ?string
    {
        return '';
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
     * @return \Orchid\Screen\Layout[]
     */
    public function layout(): iterable
    {
        return [
            Layout::tabs([
                "Matches" => Layout::view('matches', [
                    'matches' => $this->matches
                ]),
                "Tournaments" => Layout::table('tournaments', [
                    TD::make('name'),
                    TD::make('view')
                        ->render(function ($tournament) {
                            return Link::make(__('View'))
                                ->icon('eye')
                                ->type(Color::INFO())
                                ->route('tournaments.tournaments.view', [
                                    "tournament" => $tournament->id
                                ]);
                        })
                ])
            ])
        ];
    }
}
