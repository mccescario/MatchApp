<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EsportCategory extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'olympic_category_id',
        'esport_category_name',
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

    public function esport_roles()
    {
        return $this->hasMany(EsportRole::class);
    }

    public function teams()
    {
        return $this->hasMany(Team::class);
    }

    public function olympic_category()
    {
        return $this->belongsTo(OlympicCategory::class);
    }
}
