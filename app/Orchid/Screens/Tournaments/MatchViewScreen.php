<?php

namespace App\Orchid\Screens\Tournaments;

use App\Http\Helpers\Bracket\Visualizer;
use App\Models\Tournament;
use App\Models\TournamentMatch;
use Orchid\Screen\Actions\Link;
use Orchid\Screen\Screen;
use Orchid\Screen\TD;
use Orchid\Support\Facades\Layout;

class MatchViewScreen extends Screen
{
    public $current_match;
    public $tournament;
    public $bracket;

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
            "tournament" => $tournament,
            "bracket" => $bracket,
            "matches" => $tournament->matches,
            "current_match" => $tournament->matches()->where('is_current', true)->first()
        ];
    }

    /**
     * Display header name.
     *
     * @return string|null
     */
    public function name(): ?string
    {
        return $this->tournament->name;
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
            Layout::view('stream_embed', [
                'current_match' => $this->current_match
            ]),
            Layout::table('matches', [
                TD::make('Team 1')
                    ->render(function ($match) {
                        if ($match->team_one) {
                            return Link::make($match->team_one->name)
                                ->class('btn btn-success')
                                ->route('teams.teams.profile', $match->team_1_id);
                        }

                        return '';
                    }),
                TD::make('team_1_score', 'Team 1 score'),
                TD::make('Team 2')
                    ->render(function ($match) {
                        if ($match->team_two) {
                            return Link::make($match->team_two->name)
                                ->class('btn btn-success')
                                ->route('teams.teams.profile', $match->team_2_id);
                        }

                        return '';
                    }),
                TD::make('team_2_score', 'Team 2 score'),
                TD::make('level'),
                TD::make('order'),
            ]),
            Layout::view('bracket', [
                'bracket' => $this->bracket
            ]),
        ];
    }
}
