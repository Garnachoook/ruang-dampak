<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MentorReview extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'mentor_id',
        'reviewer_id',
        'batch_id',
        'rating',
        'review',
    ];

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function reviewer()
    {
        return $this->belongsTo(User::class, 'reviewer_id');
    }

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }
}
