<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'esport_name',
        'esport_ign',
        'esport_level',
        'esport_rank',
        'esport_role',
        'esport_win_rate',
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
}
