<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamModel extends Model
{
    use HasFactory;

    protected $table = 'teams';

    protected $fillable = [
        'olympic_category_id',
        'team_game_id',
        'team_name',
        'team_logo'
    ];
}
