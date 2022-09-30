<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Filters\Filterable;
use Orchid\Screen\AsSource;
use Illuminate\Database\Eloquent\Builder;

class SportRole extends Model
{
    use HasFactory, AsSource, Filterable;

    protected $fillable = [
        'name',
        'sport_id'
    ];

    public function sport()
    {
        return $this->belongsTo(Sport::class, 'sport_id');
    }

    public function scopeSportCheck(Builder $query, $sport_id)
    {
        return $query->where('sport_id', $sport_id);
    }
}
