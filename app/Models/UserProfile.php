<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class UserProfile extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'first_name',
        'last_name',
        'date_of_birth',
        'gender',
        'contact_number',
        'image',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
