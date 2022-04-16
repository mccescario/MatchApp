<?php

namespace App\Models\Host;

use App\Models\TeamParticipant;
use App\Models\TournamentMatch;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentModel extends Model
{
    use HasFactory;

    protected $table = 'tournament_models';

    protected $fillable = [

        'tournament_name',
        'tournament_sport_type',
        'tournament_sport',
        'tournament_esport',
        'tournament_format',
        'tournament_size',
        'tournament_series',
        'tournament_series',

        'tournament_date_from',
        'tournament_date_to',
        'tournament_time'
    ];

<<<<<<< HEAD
=======
    public function getIsCurrentAttribute()
    {
        return $this->matches()->where('is_current', 1)->count() > 0;
    }

>>>>>>> dev/MC-revisions
    public function participants()
    {
        return $this->hasMany(TeamParticipant::class);
    }
<<<<<<< HEAD
=======

    public function matches()
    {
        return $this->hasMany(TournamentMatch::class, 'tournament_id');
    }
>>>>>>> dev/MC-revisions
}
