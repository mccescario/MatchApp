<?php

namespace App\Orchid\Screens\Tournaments;

use App\Models\Tournament;
use App\Models\TournamentParticipant;
use App\Orchid\Filters\Tournaments\SportFilter;
use App\Orchid\Layouts\Tournaments\TournamentFilterLayout;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;

class TournamentListScreen extends Screen
{
    public $tournaments;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(): iterable
    {
        return [
            'tournaments' => Tournament::filtersApply([SportFilter::class])->defaultSort('start')->paginate()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return 'Tournament';
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        return [
            Link::make(__('Create Tournament'))
                ->icon('plus')
                ->route('tournaments.tournaments.create')
                ->canSee(Auth::user()->hasAccess('host')),
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
            TournamentFilterLayout::class,
            Layout::table('tournaments', [
                TD::make('name')
                    ->sort(),
                TD::make('sport', 'Sport')
                    ->render(function ($tournament) {
                        return $tournament->sport->name;
                    })
                    ->sort(),
                TD::make('series', 'Series')
                    ->render(function ($tournament) {
                        switch ($tournament->series) {
                            case 4:
                                return 'Best of 7';
                                break;
                            case 3:
                                return 'Best of 5';
                                break;
                            case 2:
                                return 'Best of 3';
                                break;
                            default:
                                return 'Knockout';
                                break;
                        }
                    })
                    ->sort(),
                TD::make('start')
                    ->sort(),
                TD::make('end')
                    ->sort(),
                TD::make('host', 'Host')
                    ->render(function ($tournament) {
                        return $tournament->owner->name;
                    })
                    ->sort(),
                TD::make('status', 'Status')
                    ->render(function ($tournament) {
                        switch ($tournament->status) {
                            case Tournament::DONE:
                                return '<b class="badge bg-success">DONE</b>';
                                break;
                            case Tournament::PENDING:
                                return '<b class="badge bg-warning">PENDING</b>';
                                break;
                            default:
                                return '<b class="badge bg-info">ONGOING</b>';
                                break;
                        }
                    })
                    ->sort(),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_CENTER)
                    ->width('100px')
                    ->render(function (Tournament $tournament) {
                        if (Auth::user()->id == $tournament->owner_id) {
                            return Link::make(__('Edit'))
                                ->type(Color::INFO())
                                ->icon('pen')
                                ->route('tournaments.tournaments.edit', $tournament->id);
                        }

                        if (Auth::user()->is_player && Auth::user()->is_owner && Auth::user()->team()->sport_id == $tournament->sport_id) {
                            if (!(TournamentParticipant::where('team_id', Auth::user()->team()->id)
                                ->where('tournament_id', $tournament->id)
                                ->whereIn('status', [TournamentParticipant::PENDING, TournamentParticipant::ACCEPTED])
                                ->first())) {
                                return Button::make(__('JOIN'))
                                    ->class('btn btn-ifo')
                                    ->method('joinTournament', [
                                        'tournament_id' => $tournament->id
                                    ]);
                            }
                        }
                    }),
            ])
        ];
    }

    public function joinTournament(Request $request)
    {
        $tournament = Tournament::findOrFail($request->tournament_id);

        if (!(Auth::user()->is_player && Auth::user()->is_owner && Auth::user()->team()->sport_id == $tournament->sport_id)) {
            Toast::error('Error joining team');
            return;
        }

        $joinRequest = TournamentParticipant::firstOrCreate([
            'tournament_id' => $request->tournament_id,
            'team_id' => Auth::user()->team()->id,
        ]);

        $joinRequest->update([
            'status' => TournamentParticipant::PENDING,
        ]);

        Toast::success('Request Sent');
    }

    public function permission(): ?iterable
    {
        return [
            'player',
            'host'
        ];
    }
}
