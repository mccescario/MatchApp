<?php

namespace App\Models;

use App\Models\Player\NewsFeed;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
// use Laravel\Jetstream\HasTeams;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    // use HasTeams;
    use Notifiable;
    use TwoFactorAuthenticatable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'firstname',
        'lastname',
        'birthdate',
        'gender',
        'contact_number',
        'age',
        'email',
        'username',
        'student_number',
        'course',
        'password',
        'role',
        'host_key',
        'address',
        'contact_number',
        'status',
        'sport_type',
        'verification_code',
        'profile_photo_url',
        'profile_photo_path',
        'email_verified_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
        'pivot'
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    protected $dates = ['birthdate'];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
        'fullname',
        'userrole',
    ];



    public function getFullnameAttribute()
    {
        return "{$this->firstname} {$this->lastname}";
    }

    public function getUserRoleAttribute()
    {
        $userRole = "";
        $roleInt = $this->role;
        if($roleInt == 1){
            $userRole = "Administrator";
        } else if($roleInt == 2){
            $userRole = "Host";
        } else if($roleInt == 3) {
            $userRole = "Player";
        }

        return $userRole;
    }


    public function esport()
    {
        return $this->hasOne(Esport::class);
    }

    public function sport()
    {
        return $this->hasOne(Sport::class);
    }

    public function teams()
    {
        return $this->belongsToMany(Team::class)->withTimestamps();
    }

    public function team_invitations()
    {
        return $this->hasMany(TeamInvitation::class);
    }
}
