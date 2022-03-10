<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sport extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'user_id',
        'sport_name',
        'sport_height',
        'sport_weight',
        'sport_primary_position_id',
        'sport_secondary_position_id',
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
        'sport_primary_position_id',
        'sport_secondary_position_id',
        'sport_position1',
        'sport_position2'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'sport_primary_position',
        'sport_secondary_position'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sport_position1()
    {
        return $this->belongsTo(SportPosition::class,'sport_primary_position_id');
    }

    public function sport_position2()
    {
        return $this->belongsTo(SportPosition::class,'sport_secondary_position_id');
    }

    public function getSportPrimaryPositionAttribute()
    {
        return $this->sport_position1->sport_position_name;
    }

    public function getSportSecondaryPositionAttribute()
    {
        return $this->sport_position2->sport_position_name;
    }
}
