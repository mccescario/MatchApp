<?php

namespace App\Orchid\Screens\Tournaments;

use App\Models\Sport;
use App\Models\Tournament;
use App\Models\TournamentMatch;
use App\Models\TournamentParticipant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Orchid\Screen\Actions\Button;
use Orchid\Screen\Actions\DropDown;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Fields\DateTimer;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Fields\Select;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Color;
use Orchid\Support\Facades\Layout;
use Orchid\Support\Facades\Toast;
use Orchid\Screen\Fields\Relation;


class TournamentFormScreen extends Screen
{
    public $tournament;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tournament $tournament): iterable
    {
        if ($tournament->id) {
            if ($tournament->owner_id != Auth::user()->id) {
                abort(403);
            }
        }
        return [
            'tournament' => $tournament,
            'participants' => $tournament->id ? $tournament->participants : [],
            'join_requests' => $tournament->id ? $tournament->join_requests : [],
            'metrics' => [
                'participants_count' => $tournament->id ? $tournament->participants()->count() : 0,
                'size' => $tournament->id ? $tournament->size : 0,
            ]
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->tournament->exists ? $this->tournament->name : _('Create New Tournament');
    }

    /**
     * Button commands.
     *
     * @return \Orchid\Screen\Action[]
     */
    public function commandBar(): iterable
    {
        if ($this->tournament->id) {
            return [
                Button::make('Generate Bracket')
                    ->class('btn btn-info')
                    ->method('generateBracket')
                    ->canSee($this->tournament->id && $this->tournament->is_full && $this->tournament->matches()->count() === 0),
                Link::make(__('View Matches'))
                    ->icon('eye')
                    ->color(Color::INFO())
                    ->route('tournaments.tournaments.bracket', [
                        'tournament' => $this->tournament->id ? $this->tournament->id : null
                    ])
                    ->canSee($this->tournament->id && $this->tournament->matches()->count() > 0),
            ];
        }

        return [
            Button::make('Generate Bracket')
                ->class('btn btn-info')
                ->method('generateBracket')
                ->canSee($this->tournament->id && $this->tournament->is_full && $this->tournament->matches()->count() === 0),
        ];
    }

    /**
     * Views.
     *
     * @return \Orchid\Screen\Layout[]|string[]
     */
    public function layout(): iterable
    {
        $series = array(1   => 'Knock-out',2   => 'Best of 3',3   => 'Best of 5',4   => 'Best of 7');
        return [
            Layout::columns([
                Layout::metrics([
                    'Participants Count' => 'metrics.participants_count',
                    'Required Participants' => 'metrics.size'
                ])->canSee($this->tournament->id !== null)
            ]),
            Layout::columns([
                Layout::rows([
                    Input::make('tournament.name')
                        ->required()
                        ->max(255)
                        ->title('Name'),
                    Select::make('tournament.size')
                        ->options([
                            4   => '4',
                            8   => '8',
                            16   => '16',
                        ])
                        ->value($this->tournament->size)
                        ->empty($this->tournament->size, $this->tournament->size)
                        ->required()
                        ->title('Size'),
                    Select::make('tournament.series')
                        ->options($series)
                        ->value($this->tournament->series)
                        ->empty($series[$this->tournament->series], $this->tournament->series)
                        ->required()
                        ->title('Series'),
                    DateTimer::make('tournament.start')
                        ->title('Start')
                        ->required(),
                    DateTimer::make('tournament.end')
                        ->title('End')
                        ->required(),
                    Relation::make('tournament.sport_id')
                        // ->required()
                        ->value($this->tournament->sport_id)
                        ->fromModel(Sport::class, 'name')
                        ->title('Sport'),
                    Button::make('Save')
                        ->class('btn btn-success')
                        ->method('saveTournament')
                ]),
                Layout::table('participants', [
                    TD::make('name')
                        ->render(function ($participant) {
                            return $participant->team->name;
                        }),
                    TD::make(__('Actions'))
                        ->render(function ($participant) {
                            return Button::make('Remove')
                                ->align(TD::ALIGN_RIGHT)
                                ->class('btn btn-danger')
                                ->method('removeParticipant', [
                                    'participant_id' => $participant->id,
                                ]);
                        })
                ])->canSee($this->tournament->id !== null)
            ]),
            Layout::columns([
                Layout::table('join_requests', [
                    TD::make('name')
                        ->render(function ($joinRequest) {
                            return $joinRequest->team->name;
                        }),
                    TD::make(__('Actions'))
                        ->align(TD::ALIGN_CENTER)
                        ->width('100px')
                        ->render(function ($joinRequest) {
                            return DropDown::make()
                                ->icon('options-vertical')
                                ->list([
                                    Button::make('Accept')
                                        ->class('btn btn-success')
                                        ->method('actionRequest', [
                                            'join_request_id' => $joinRequest->id,
                                            'join_request_action' => TournamentParticipant::ACCEPTED,
                                        ]),
                                    Button::make('Reject')
                                        ->class('btn btn-danger')
                                        ->method('actionRequest', [
                                            'join_request_id' => $joinRequest->id,
                                            'join_request_action' => TournamentParticipant::REJECTED,
                                        ]),
                                ]);
                        }),
                ])->canSee($this->tournament->id !== null)
            ])
        ];
    }

    public function saveTournament(Tournament $tournament, Request $request)
    {
        $request->validate([
            'tournament.name' => 'required|max:255',
            'tournament.size' => 'required|integer|min:1',
            'tournament.series' => 'required|integer|min:1|max:4',
            'tournament.start' => 'required|date|after:now',
            'tournament.end' => 'required|date|after:now'
        ]);

        if ($tournament->id) {
            $tournament->update($request->get('tournament'));
            Toast::success('Tournament Updated');
        } else {
            $tournament = Tournament::create([...$request->get('tournament'), 'owner_id' => Auth::user()->id]);
            Toast::success('Tournament Created');
        }

        return redirect()->route('tournaments.tournaments.edit', ['tournament' => $tournament->id]);
    }

    public function actionRequest(Tournament $tournament, Request $request)
    {
        if ($tournament->owner_id != Auth::user()->id) {
            Toast::error("You don't own the tournament");
            return;
        }

        $joinRequest = TournamentParticipant::findOrFail($request->join_request_id);

        if ($joinRequest->status !== TournamentParticipant::PENDING) {
            Toast::error('Error Taking Action with Request');
            return;
        }

        if ($request->join_request_action === TournamentParticipant::ACCEPTED && $tournament->is_full) {
            Toast::error('Tournament Full');
            return;
        }

        $joinRequest->update([
            'status' => $request->join_request_action,
        ]);

        Toast::success('Request ' . $request->join_request_action);
    }

    public function removeParticipant(Tournament $tournament, Request $request)
    {
        if ($tournament->owner_id != Auth::user()->id) {
            Toast::error("You don't own the tournament");
            return;
        }

        $participant = TournamentParticipant::findOrFail($request->participant_id);

        if ($participant->status !== TournamentParticipant::ACCEPTED) {
            Toast::error('Error Taking Action with Request');
            return;
        }


        $participant->update([
            'status' => TournamentParticipant::REJECTED,
        ]);

        Toast::success('Participant Removed');
    }

    public function generateBracket(Tournament $tournament)
    {
        $tournament_size = $tournament->size;
        switch ($tournament->size) {
            case 4:
                $highest_level = 2;
                break;
            case 8:
                $highest_level = 3;
                break;
            default:
                $highest_level = 16;

                break;
        }

        $participants = $tournament->participants->map(function ($item) {
            return $item->team_id;
        })->toArray();

        shuffle($participants);

        $level = $highest_level;
        for ($i = $tournament_size / 2; $i >= 1; $i /= 2) {
            if ($i === $tournament_size / 2) {
                $order = 1;
                for ($j = 0; $j < $tournament_size; $j += 2) {
                    TournamentMatch::create([
                        'team_1_id' => $participants[$j],
                        'team_2_id' => $participants[$j + 1],
                        'team_1_score' => 0,
                        'team_2_score' => 0,
                        'order' => $order,
                        'level' => $level,
                        'tournament_id' => $tournament->id
                    ]);
                    $order++;
                }
            } else {
                $order = 1;
                for ($k = 0; $k < $i; $k++) {
                    TournamentMatch::create([
                        'order' => $order,
                        'level' => $level,
                        'team_1_score' => 0,
                        'team_2_score' => 0,
                        'tournament_id' => $tournament->id
                    ]);
                    $order++;
                }
            }

            $level--;
        }

        Toast::success('Bracket Generated');

        return redirect()->route('tournaments.tournaments.bracket', [
            'tournament' => $tournament->id
        ]);
    }

    public function permission(): ?iterable
    {
        return [
            'host'
        ];
    }
}
