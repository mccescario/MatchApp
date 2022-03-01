<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlympicGame extends Model
{
    use HasFactory;

    protected $fillable = [
        'olympic_game_name',
        'olympic_game_type',
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

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function esport_profile()
    {
        return $this->hasOne(EsportProfile::class);
    }

    public function sport_profile()
    {
        return $this->hasOne(SportProfile::class);
    }

    
}
