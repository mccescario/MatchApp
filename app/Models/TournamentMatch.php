<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class TournamentMatch extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'team_1_id',
        'team_2_id',
        'team_1_score',
        'team_2_score',
        'order',
        'level',
        'is_current',
        'stream_link',
        'winning_team',
        'tournament_id',
    ];

    public function tournament()
    {
        return $this->belongsTo(Tournament::class);
    }

    public function team_one()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function team_two()
    {
        return $this->belongsTo(Team::class, 'team_2_id');
    }

    public function getNameAttribute()
    {
        return $this->team_one->name . _(' vs ') . $this->team_two->name;
    }
}
