<?php

namespace App\Models\Host;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TournamentModel extends Model
{
    use HasFactory;

    protected $fillable = [

        'tournament_name',
        'tournament_date',
        'tournament_sport',
        'tournament_esport',
        'tournament_sport_type',
        'tournament_bracket',
        'tournament_fee',
        'enable_third_place',
        'single_bracket_size',
        'single_best_of_rounds',
        'double_bracket_size',
        'double_best_of_rounds',
        'num_groups',
        'round_robin_match_style',
        'num_player_per_group',
        'games_per_match',
        'tournament_price'
    ];
}
