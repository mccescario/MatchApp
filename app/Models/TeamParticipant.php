<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamParticipant extends Model
{
    use HasFactory;

    protected $fillable = [
        'tournament_model_id',
        'team_id',
        'status'
    ];

<<<<<<< HEAD
=======
    protected $appends = [
        'name',
    ];

    protected $with = [
        'team'
    ];

>>>>>>> dev/MC-revisions
    public function tournament()
    {
        return $this->belongsTo(Host\TournamentModel::class, 'tournament_model_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
<<<<<<< HEAD
=======

    public function getNameAttribute()
    {
        return $this->team->team_name;
    }
>>>>>>> dev/MC-revisions
}
