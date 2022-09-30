<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;

class Sport extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $allowedFilters = [
        'sport_category_id',
    ];

    protected $allowedSorts = [
        'name'
    ];

    protected $fillable = [
        'name',
        'sport_category_id'
    ];


    public function category()
    {
        return $this->belongsTo(SportCategory::class, 'sport_category_id');
    }

    public function roles()
    {
        return $this->hasMany(SportRole::class, 'sport_id');
    }
}
