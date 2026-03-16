<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorProfile extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'user_id',
        'headline',
        'skills',
        'fee_per_session',
        'linkedin_url',
        'portfolio_url',
        'status',
    ];

    protected $casts = [
        'skills' => 'array',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function averageRating(): float
    {
        return (float) MentorReview::where('mentor_id', $this->user_id)->avg('rating') ?? 0;
    }
}
