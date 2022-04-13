<?php

namespace App\Http\Livewire;

use App\Http\Helpers\Bracket\Visualizer;
use App\Models\Host\TournamentModel;
use App\Models\TournamentMatch;
use Livewire\Component;

class TournamentMatchesTable extends Component
{
    public $tournament_id;
    public $tournament;
    public $matches = [];
    public $can_generate = false;
    public $winning_score;
    public $team_size;

    protected $listeners = ['score-updated' => 'scoreUpdated'];

    public function mount(TournamentModel $tournamentModel)
    {
        $this->tournament = $tournamentModel;
        $this->tournament_id = $tournamentModel->id;
        $this->matches = TournamentMatch::where('tournament_id', $tournamentModel->id)->get();
        $this->team_size = $tournamentModel->participants()->count();

        $tournament_size = 0;

        switch ($this->tournament->tournament_size) {
            case 2:
                $tournament_size = 4;
                break;
            case 3:
                $tournament_size = 8;
                break;
            case 4:
                $tournament_size = 16;
                break;
        }

        $winning_score = 1;

        switch ($this->tournament->tournament_series) {
            case 2:
                $winning_score = 3;
                break;
            case 3:
                $winning_score = 5;
                break;
            case 4:
                $winning_score = 7;
                break;
        }

        $this->winning_score = $winning_score;
        $this->can_generate = $tournament_size == $tournamentModel->participants()->count();
    }

    public function render()
    {
        if (count($this->matches)) {
            $settings  = array('image' => false, 'bronze' => false, 'nobronze' => false);

            $tournaments = $this->matches;

            $raw_matches = array();
            $teams_1 = array();
            $teams_2 = array();

            foreach ($tournaments as $item) {
                $teams_1['name'] =  $item->team_one_name;
                $teams_1['score'] = $item->team_1_score;
                $teams_2['name'] =  $item->team_two_name;
                $teams_2['score'] = $item->team_2_score;

                $raw_matches[] = $teams_1;
                $raw_matches[] = $teams_2;
            }

            $brackets = new Visualizer($raw_matches, $settings, $this->team_size);
            $bracket = $brackets->RenderFromData();

            // dd($bracket);
        } else {
            $bracket = '';
        }

        return view('livewire.tournament-matches-table', [
            'bracket' => $bracket
        ]);
    }

    public function generate()
    {
        $tournament_size = 0;
        $highest_level = $this->tournament->tournament_size;

        switch ($this->tournament->tournament_size) {
            case 2:
                $tournament_size = 4;
                break;
            case 3:
                $tournament_size = 8;
                break;
            case 4:
                $tournament_size = 16;
                break;
        }

        $participants = $this->tournament->participants->map(function ($item) {
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
                        'tournament_id' => $this->tournament->id
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
                        'tournament_id' => $this->tournament->id
                    ]);
                    $order++;
                }
            }

            $level--;
        }

        $this->matches = TournamentMatch::where('tournament_id', $this->tournament_id)->get();
    }

    public function scoreUpdated()
    {
        $this->matches = TournamentMatch::where('tournament_id', $this->tournament_id)
            ->orderBy('level', 'DESC')
            ->orderBy('order')
            ->get();
    }
}
