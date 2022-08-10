<?php

namespace App\Models;

use Orchid\Filters\Filterable;
use Orchid\Platform\Models\User as Authenticatable;
use Orchid\Screen\AsSource;

class User extends Authenticatable
{
    use AsSource, Filterable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'permissions',
    ];

    /**
     * The attributes excluded from the model's JSON form.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'permissions',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'permissions'          => 'array',
        'email_verified_at'    => 'datetime',
    ];

    /**
     * The attributes for which you can use filters in url.
     *
     * @var array
     */
    protected $allowedFilters = [
        'id',
        'name',
        'email',
        'permissions',
    ];

    /**
     * The attributes for which can use sort in url.
     *
     * @var array
     */
    protected $allowedSorts = [
        'id',
        'name',
        'email',
        'updated_at',
        'created_at',
    ];

    public function profile()
    {
        return $this->hasOne(UserProfile::class);
    }

    public function player_profile()
    {
        return $this->hasOne(PlayerProfile::class);
    }

    public function getIsPlayerAttribute()
    {
        return $this->hasAccess('player');
    }

    public function getIsOwnerAttribute()
    {
        return $this->team_owned ? true : false;
    }

    public function team_owned()
    {
        return $this->hasOne(Team::class, 'owner_id');
    }

    public function memberships()
    {
        return $this->hasMany(TeamMember::class, 'member_id');
    }

    public function team()
    {
        $member = TeamMember::where('member_id', $this->id)
            ->whereIn('status', ['approved', 'owner'])
            ->first();

        if ($member) {
            return $member->team;
        }

        return null;
    }
}
