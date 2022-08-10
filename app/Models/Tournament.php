<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Tournament extends Model
{
    use HasFactory, AsSource, Filterable;

    public const DONE = 'done';
    public const ONGOING = 'ongoing';
    public const PENDING = 'pending';
    public const FULL = 'full';

    protected $fillable = [
        "name",
        "series",
        "size",
        "start",
        "end",
        "owner_id",
        "sport_id"
    ];

    protected $allowedSorts = [
        'name',
        'sport',
        'series',
        'start',
        'end',
        'host'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function owner()
    {
        return $this->belongsTo(User::class, 'owner_id');
    }

    public function getStatusAttribute()
    {
        if (Carbon::today()->lt($this->start)) {
            return Tournament::PENDING;
        }

        if (Carbon::today()->gt($this->end)) {
            return Tournament::DONE;
        }

        return Tournament::ONGOING;
    }

    public function getIsFullAttribute()
    {
        return $this->size <= $this->participants()->count();
    }

    public function participants()
    {
        return $this->hasMany(TournamentParticipant::class)->where('status', TournamentParticipant::ACCEPTED);
    }

    public function join_requests()
    {
        return $this->hasMany(TournamentParticipant::class)->where('status', TournamentParticipant::PENDING);
    }

    public function matches()
    {
        return $this->hasMany(TournamentMatch::class);
    }
}
