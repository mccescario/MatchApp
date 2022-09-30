<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlayerProfile extends Model
{
    use HasFactory;

    protected $fillable = [
        'sport_id',
        'course_id',
        'sport_role_id',
        'student_number',
        'user_id'
    ];

    public function course()
    {
        return $this->belongsTo(Course::class);
    }

    public function sport()
    {
        return $this->belongsTo(Sport::class);
    }

    public function sport_role()
    {
        return $this->belongsTo(SportRole::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
