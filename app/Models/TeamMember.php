<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeamMember extends Model
{
    use HasFactory;

    protected $fillable = [
        'team_id',
        'user_id',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'team_id',
        'user_id',
        'team',
        'user'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'ign',
        'real_name',
        'role',
        'position'
    ];

    public function getIgnAttribute()
    {
        $ign = $this->team->olympic_category_id == 2 ? $this->user->esport->esport_ign : null;
        return $ign;
    }

    public function getRealNameAttribute()
    {
        return $this->user->fullname;
    }

    public function getRoleAttribute()
    {
        return $this->team->olympic_category_id == 2 ? $this->user->esport->esport_role : null;
    }

    public function getPositonAttribute()
    {
        return $this->team->olympic_category_id == 1 ? $this->user->sport->sport_position : null;
    }

    public function user()
    {
        return $this->belongsTo(User::class); 
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }


}
