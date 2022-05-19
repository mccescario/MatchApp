<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SportPosition extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'sport_category_id',
        'sport_position_name',
        'is_captain',
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


    public function sport_category()
    {
        return $this->belongsTo(SportCategory::class);
    }

    public function sport_primaries()
    {
        return $this->hasMany(Sport::class,'sport_primary_position_id');
    }

    public function sport_secondaries()
    {
        return $this->hasMany(Sport::class,'sport_secondary_position_id');
    }
}
