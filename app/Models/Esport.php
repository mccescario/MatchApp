<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Esport extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'esport_role_id',
        'esport_category_id',
        'esport_ign',
        'esport_level',
        'esport_rank',
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
        'id',
        'user_id',
        'esport_role',
        'esport_category',
        'esport_category_id'
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'esport_role_name',
        'esport_name'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function esport_role()
    {
        return $this->belongsTo(EsportRole::class,'esport_role_id','id');
    }

    public function getEsportRoleNameAttribute()
    {
        $esportRoleName = $this->esport_role != null ? $this->esport_role->esport_role_name : null;
        return $esportRoleName;
    }

    public function esport_category()
    {
        return $this->belongsTo(EsportCategory::class);
    }

    public function getEsportNameAttribute()
    {
        return $this->esport_category->esport_category_name;
    }
}
