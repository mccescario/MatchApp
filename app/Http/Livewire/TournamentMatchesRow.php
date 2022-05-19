<?php

namespace App\Http\Livewire;

use App\Models\TournamentMatch;
use Livewire\Component;

class TournamentMatchesRow extends Component
{
    public $match;

    public $score_one;
    public $score_two;

    public $winning_score;
    public $level;
    public $order;
    public $tournament_id;
    public $winning_team;

    public $editable = false;

    public function mount(TournamentMatch $tournamentMatch, $winning_score)
    {
        $this->match = $tournamentMatch;
        $this->score_one = $tournamentMatch->team_1_score;
        $this->score_two = $tournamentMatch->team_2_score;

        $this->level = $tournamentMatch->level;
        $this->order = $tournamentMatch->order;
        $this->tournament_id = $tournamentMatch->tournament_id;
        $this->winning_team = $tournamentMatch->winning_team;

        $this->winning_score = $winning_score;

        $this->editable = $tournamentMatch->team_1_id && $tournamentMatch->team_2_id;
    }

    public function render()
    {
        return view('livewire.tournament-matches-row');
    }

    public function updatedScoreOne()
    {
        if ($this->score_one >= $this->winning_score) {
            // dd($this->winning_score);
            $this->match->update([
                'team_1_score' => $this->score_one,
                'winning_team' => 1,
            ]);

            $this->winning_team = 1;

            $this->levelUp($this->match->team_1_id);
        } else {
            $this->match->update([
                'team_1_score' => $this->score_one,
            ]);
        }

        $this->emitUp('score-updated');
    }

    public function updatedScoreTwo()
    {
        if ($this->score_two >= $this->winning_score) {
            $this->match->update([
                'team_2_score' => $this->score_two,
                'winning_team' => 2,
            ]);

            $this->winning_team = 2;

            $this->levelUp($this->match->team_2_id);
        } else {
            $this->match->update([
                'team_2_score' => $this->score_two,
            ]);
        }

        $this->emitUp('score-updated');
    }

    public function levelUp($team_id)
    {
        if ($this->level == 1) {
            return;
        }

        $newLevel = $this->level -= 1;
        $newOrder = 0;

        if ($this->order % 2 == 1) {
            $newOrder = $this->order + 1;
        } else {
            $newOrder = $this->order;
        }

        $newOrder = $newOrder / 2;


        $newMatch = TournamentMatch::where('tournament_id', $this->tournament_id)
            ->where('order', $newOrder)
            ->where('level', $newLevel)
            ->first();

        // if (!$newMatch) {
        //     dd($newLevel, $this->order, $newOrder);
        // }

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
