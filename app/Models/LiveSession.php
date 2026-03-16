<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveSession extends Model
{
    use HasUuids;

    protected $fillable = [
        'batch_id',
        'title',
        'description',
        'week_number',
        'session_number',
        'scheduled_at',
        'duration_min',
        'meeting_url',
        'recording_url',
        'status'
    ];

    protected $casts = [
        'scheduled_at' => 'datetime',
    ];

    public function batch(): BelongsTo
    {
        return $this->belongsTo(Batch::class);
    }

    public function isUpcoming(): bool
    {
        return $this->scheduled_at->isFuture() && $this->status === 'scheduled';
    }

    public function isToday(): bool
    {
        return $this->scheduled_at->isToday();
    }
}