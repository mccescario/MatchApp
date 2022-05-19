<?php

namespace App\Models\Host;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HostProfile extends Model
{
    use HasFactory;

    protected $table = 'users';

    protected $fillable = [
        'firstname',
        'lastname',
        'username',
        'email',
        'password',
        'address',
        'birthdate',
        'contact_number',
    ];

}
