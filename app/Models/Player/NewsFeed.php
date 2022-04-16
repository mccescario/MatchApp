<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
use Attribute;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsFeed extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'news_feed';
    protected $fillable = [
        'title',
        'description',
        'img_path',
        'user_id',
    ];

    /**
     * Get the user that owns the NewsFeed
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function sluggable(): array
    {
        # code...
        return [
            'slug'=> [
                'source' => 'title'
            ]
        ];
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'created_at',
        'updated_at',
        'user_id'
    ];

     /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'author',
        'date',
        'img_path_host',
        'img_path_public'
    ];

    public function getAuthorAttribute()
    {
        return "{$this->user->firstname} {$this->user->lastname}";
    }

    /**
     * Get the user's first name.
     *
     * @param  string  $value
     * @return string
     */
    public function getDateAttribute()
    {
        return $this->created_at->format('F d, Y');
    }

<<<<<<< HEAD
    // public function getImgPathAttribute($value)
    // {
    //     return url("public/images/{$value}");
    // }

    public function getImgPathPublicAttribute()
    {
        return url("public/images/{$this->img_path}");
    }

    public function getImgPathHostAttribute()
    {
        return url("images/{$this->img_path}");
=======
    public function getImgPathAttribute($value)
    {
        return url("public/images/{$value}");
>>>>>>> dev/MC-revisions
    }
}
