<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsportProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'olympic_game_id',
        'esport_profile_name',
        'esport_profile_level',
        'esport_profile_rank',
        'esport_profile_role',
        'esport_profile_win_rate',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];

    public function olympic_game()
    {
        return $this->belongsTo(OlympicGame::class);
    }
}
