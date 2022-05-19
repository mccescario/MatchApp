<?php

namespace App\Http\Livewire;

use App\Models\TournamentMatch;
use Livewire\Component;

class MatchCurrentStatusToggle extends Component
{
    public $match;
    public $is_current;

    protected $rules = [
        'stream_link' => 'required'
    ];

    public function mount(TournamentMatch $tournamentMatch)
    {
        $this->match = $tournamentMatch;
        $this->is_current = $tournamentMatch->is_current;

        // dd($this->match->id);
    }

    public function render()
    {
        return view('livewire.match-current-status-toggle');
    }

    public function updatedIsCurrent()
    {
        if ($this->is_current) {
            if (!isset($this->match->stream_link)) {
                $this->addError('stream_link', 'You need youtube embed to show the match in user\'s newsfeed');
                $this->is_current = false;
                return;
            }
        }

        $this->match->update([
            'is_current' => $this->is_current,
        ]);

        // dd($this->is_current);
    }
}
