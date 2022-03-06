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

    // /**
    //  * The event map for the model.
    //  *
    //  * @var array
    //  */
    // protected $dispatchesEvents = [
    //     'created' => TeamCreated::class,
    //     'updated' => TeamUpdated::class,
    //     'deleted' => TeamDeleted::class,
    // ];
    
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
    ];


    public function team_members()
    {
        return $this->hasMany(TeamMember::class);
    }
}
