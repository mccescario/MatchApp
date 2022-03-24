<?php

namespace App\Models\Host;

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
}
