<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Orchid\Screen\AsSource;

class TeamMember extends Model
{
    use HasFactory, AsSource;

    public const APPROVED = 'approved';
    public const OWNER = 'owner';
    public const PENDING = 'pending';
    public const CANCELLED = 'cancelled';
    public const REMOVED = 'removed';
    public const REJECTED = 'rejected';
    public const LEAVED = 'leaved';
    public const INVITE_PENDING = 'invite_pending';
    public const INVITE_REJECTED = 'invite_rejected';

    protected $fillable = [
        'status',
        'member_id',
        'team_id',
    ];

    public function member()
    {
        return $this->belongsTo(User::class, 'member_id');
    }

    public function team()
    {
        return $this->belongsTo(Team::class);
    }
}
