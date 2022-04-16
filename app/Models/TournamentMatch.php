<?php

namespace App\Models;

use App\Models\Host\TournamentModel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentMatch extends Model
{
    use HasFactory;

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

    protected $appends = [
        'team_one_name',
        'team_two_name',
    ];

    protected $casts = [
        'is_current' => 'boolean',
    ];

    public function tournament()
    {
        return $this->belongsTo(TournamentModel::class, 'tournament_id');
    }

    public function team_one()
    {
        return $this->belongsTo(Team::class, 'team_1_id');
    }

    public function getTeamOneNameAttribute()
    {
        return $this->team_one()->exists() ? $this->team_one->team_name : '';
    }

    public function team_two()
    {
        return $this->belongsTo(Team::class, 'team_2_id', 'id');
    }

    public function getTeamTwoNameAttribute()
    {
        return  $this->team_two()->exists() ? $this->team_two->team_name : '';
    }
}
