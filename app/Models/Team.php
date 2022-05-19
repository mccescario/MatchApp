<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Jetstream\Events\TeamCreated;
use Laravel\Jetstream\Events\TeamDeleted;
use Laravel\Jetstream\Events\TeamUpdated;
use Laravel\Jetstream\Team as JetstreamTeam;

class Team extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'olympic_category_id',
        'team_game_id',
        'team_name',
        'team_logo',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        // 'olympic_category_id',
        'team_game_id',
        'created_at',
        'updated_at',
        'pivot',
        'team_members',
        // 'users',
        'EsportCategory',
        'SportCategory',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'team_members',
        'game',
        'game_id'
    ];


    public function users()
    {
        return $this->belongsToMany(User::class)->withTimestamps();
    }

    public function EsportCategory()
    {
        return $this->belongsTo(EsportCategory::class, 'team_game_id', 'id');
    }

    public function SportCategory()
    {
        return $this->belongsTo(SportCategory::class, 'team_game_id', 'id');
    }

    public function getGameAttribute()
    {
        $game = $this->olympic_category_id == 2 ? $this->EsportCategory->esport_category_name : $this->SportCategory->sport_category_name;
        return $game;
    }

    public function getGameIdAttribute()
    {
        $game_id = $this->olympic_category_id == 2 ? $this->EsportCategory->id : $this->SportCategory->id;
        return $game_id;
    }

    public function members()
    {
        $members = $this->olympic_category_id == 2 ? $this->users()->union($this->users()->esport) : $this->users()->union($this->users()->sport);
        return $members;
    }

    public function olympic_category()
    {
        return $this->belongsTo(OlympicCategory::class);
    }

    public function team_invitations()
    {
        return $this->hasMany(TeamInvitation::class);
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
