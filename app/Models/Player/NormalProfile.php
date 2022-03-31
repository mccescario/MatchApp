<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NormalProfile extends Model
{
    use HasFactory;

    //protected $table = 'users';

    protected $fillable = [
        'profile_photo_path',
    ];

}
