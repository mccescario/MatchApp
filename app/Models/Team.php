<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Team extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'name',
        'image',
        'owner_id',
        'sport_id',
    ];

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function members()
    {
        return $this->hasMany(TeamMember::class)->whereIn('status', [TeamMember::APPROVED, TeamMember::OWNER]);
    }

    public function requests()
    {
        return $this->hasMany(TeamMember::class)->where('status', TeamMember::PENDING);
    }

    public function matches_one()
    {
        return $this->hasMany(TournamentMatch::class, 'team_1_id');
    }

    public function matches_two()
    {
        return $this->hasMany(TournamentMatch::class, 'team_2_id');
    }

    public function getMatchesAttribute()
    {
        return $this->matches_one->merge($this->matches_two);
    }

    public function getWinsOneAttribute()
    {
        return $this->matches_one()->where('winning_team', 1)->get();
    }

    public function getWinsTwoAttribute()
    {
        return $this->matches_two()->where('winning_team', 2)->get();
    }

    public function getWinCountAttribute()
    {
        return $this->wins_one->merge($this->wins_two)->count();
    }
}
