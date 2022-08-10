<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class SportCategory extends Model
{
    use HasFactory, AsSource;

    protected $allowedSorts = [
        'name'
    ];

    protected $fillable = [
        'name'
    ];

    public function sports()
    {
        return $this->hasMany(Sport::class);
    }
}
