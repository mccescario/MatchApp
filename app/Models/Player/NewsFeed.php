<?php

namespace App\Models\Player;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;
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
}
