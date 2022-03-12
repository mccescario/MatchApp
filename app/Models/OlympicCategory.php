<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OlympicCategory extends Model
{
    use HasFactory;

    protected $fillable = [
        'olympic_category_name',
        'created_at',
        'updated_at'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'sport_categories',
        'esport_categories'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'games'
    ];

    public function esport_categories()
    {
        return $this->hasMany(EsportCategory::class);
    }

    public function sport_categories()
    {
        return $this->hasMany(SportCategory::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function getGamesAttribute()
    {
        $olympic = strtolower($this->olympic_category_name);
        $relation = $olympic."_categories";
        $pluck = $olympic."_category_name";
        $data = collect($this->$relation)->pluck($pluck);
        return $data;
    }
}
