<?php

namespace App\Orchid\Screens\Tournaments;

use App\Models\Tournament;
use App\Models\TournamentMatch;
use Illuminate\Http\Request;
use Orchid\Screen\Actions\ModalToggle;
use Orchid\Screen\Fields\Input;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;
use App\Http\Helpers\Bracket\Visualizer;
use Orchid\Screen\Fields\CheckBox;
use Orchid\Support\Facades\Toast;

class TournamentBracketScreen extends Screen
{
    public $tournament;

    /**
     * Query data.
     *
     * @return array
     */
    public function query(Tournament $tournament): iterable
    {
        $settings  = array('image' => false, 'bronze' => false, 'nobronze' => false);

        $tournaments = $tournament->matches()->orderBy('level', 'DESC')->orderBy('order')->get();

        $raw_matches = array();
        $teams_1 = array();
        $teams_2 = array();

        foreach ($tournaments as $item) {
            $teams_1['name'] =  $item->team_one ? $item->team_one->name : '';
            $teams_1['score'] = $item->team_1_score;
            $teams_2['name'] =  $item->team_two ? $item->team_two->name : '';
            $teams_2['score'] = $item->team_2_score;

            $raw_matches[] = $teams_1;
            $raw_matches[] = $teams_2;
        }

        $brackets = new Visualizer($raw_matches, $settings, $tournament->size);
        $bracket = $brackets->RenderFromData();


        return [
            'tournament' => $tournament,
            'matches' => $tournament->matches()->orderBy('level', 'DESC')->orderBy('order')->get(),
            'bracket' => $bracket
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->tournament->name . _(' Matches');
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
            Layout::table('matches', [
                TD::make('Team 1')
                    ->render(fn ($match) => $match->team_one ? $match->team_one->name : ''),
                TD::make('team_1_score', 'Team 1 score'),
                TD::make('Team 2')
                    ->render(fn ($match) => $match->team_two ? $match->team_two->name : ''),
                TD::make('team_2_score', 'Team 2 score'),
                TD::make('level'),
                TD::make('order'),
                TD::make(__('Update Scores'))
                    ->align(TD::ALIGN_RIGHT)
                    ->width('100px')
                    ->render(function (TournamentMatch $tournamentMatch) {
                        if ($tournamentMatch->team_1_id && $tournamentMatch->team_2_id && !$tournamentMatch->winning_team) {
                            return ModalToggle::make('Update')
                                ->class('btn btn-info')
                                ->modal('matchUpdateModal')
                                ->modalTitle(($tournamentMatch->team_one ? $tournamentMatch->team_one->name : '') . _(' vs ') . ($tournamentMatch->team_two ? $tournamentMatch->team_two->name : ''))
                                ->method('updateMatch')
                                ->asyncParameters($tournamentMatch);
                        }
                    }),
                TD::make(__('Actions'))
                    ->align(TD::ALIGN_RIGHT)
                    ->width('100px')
                    ->render(function (TournamentMatch $tournamentMatch) {
                        return ModalToggle::make('Update')
                            ->class('btn btn-info')
                            ->modal('updateFormMatch')
                            ->modalTitle(($tournamentMatch->team_one ? $tournamentMatch->team_one->name : '') . _(' vs ') . ($tournamentMatch->team_two ? $tournamentMatch->team_two->name : ''))
                            ->method('updateMatchForm')
                            ->asyncParameters($tournamentMatch);
                    }),
            ]),
            Layout::view('bracket'),
            Layout::modal('matchUpdateModal', [
                Layout::rows([
                    Input::make('match.team_1_score')
                        ->type('number')
                        ->min(0)
                        ->title('Team one score'),
                    Input::make('match.team_2_score')
                        ->type('number')
                        ->min(0)
                        ->title('Team two score'),
                    Input::make('match.id')
                        ->type('hidden'),
                ])
            ])->async('asyncGetMatch'),
            Layout::modal('updateFormMatch', [
                Layout::rows([
                    Input::make('match.stream_link')
                        ->title('Stream Link'),
                    CheckBox::make('match.is_current')
                        ->sendTrueOrFalse()
                        ->title('Tag as Current'),
                    Input::make('match.id')
                        ->type('hidden'),
                ]),
            ])->async('asyncGetMatch'),
        ];
    }

    public function asyncGetMatch($tournamentMatch)
    {
        return [
            'match' => $tournamentMatch
        ];
    }

    public function updateMatch(Tournament $tournament, Request $request)
    {
        $match = TournamentMatch::findOrFail($request->get('match')['id']);

        if ($request->get('match')['team_1_score'] >= $tournament->series) {
            $match->update([
                'team_1_score' => $request->get('match')['team_1_score'],
                'winning_team' => 1,
            ]);

            $this->levelUp($match->team_1_id, $match->level, $match->order, $match->tournament_id);
        } else {
            $match->update([
                'team_1_score' => $request->get('match')['team_1_score'],
            ]);
        }

        if ($request->get('match')['team_2_score'] >= $tournament->series) {
            $match->update([
                'team_2_score' => $request->get('match')['team_2_score'],
                'winning_team' => 2,
            ]);

            $this->levelUp($match->team_2_id, $match->level, $match->order, $match->tournament_id);
        } else {
            $match->update([
                'team_2_score' => $request->get('match')['team_2_score'],
            ]);
        }
    }

    public function updateMatchForm(Request $request)
    {
        $request->validate([
            'match.stream_link' => 'required'
        ]);

        $match = TournamentMatch::findOrFail($request->get('match')['id']);

        $match->update([
            'stream_link' => $request->get('match')['stream_link'],
            'is_current' => $request->get('match')['is_current'],
        ]);

        Toast::success('Match Updated');
    }

    public function levelUp($team_id, $level, $order, $tournament_id)
    {
        if ($level == 1) {
            return;
        }

        $newLevel = $level -= 1;
        $newOrder = 0;

        if ($order % 2 == 1) {
            $newOrder = $order + 1;
        } else {
            $newOrder = $order;
        }

        $newOrder = $newOrder / 2;


        $newMatch = TournamentMatch::where('tournament_id', $tournament_id)
            ->where('order', $newOrder)
            ->where('level', $newLevel)
            ->first();

        if ($newMatch->team_1_id) {
            $newMatch->update([
                'team_2_id' => $team_id,
            ]);
        } else {
            $newMatch->update([
                'team_1_id' => $team_id,
            ]);
        }
    }
}
