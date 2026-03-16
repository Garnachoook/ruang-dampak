<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'program_id',
        'name',
        'start_date',
        'end_date',
        'quota',
        'status',
        'mentor_id',
        'zoom_link',
    ];

    protected $casts = [
        'start_date' => 'date',
        'end_date' => 'date',
    ];

    public function liveSessions(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(LiveSession::class)->orderBy('scheduled_at');
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function mentor()
    {
        return $this->belongsTo(User::class, 'mentor_id');
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function assignments()
    {
        return $this->hasMany(Assignment::class);
    }

    // ── Helpers ──

    public function enrolledCount(): int
    {
        return $this->enrollments()->count();
    }

    public function isFull(): bool
    {
        return $this->enrolledCount() >= $this->quota;
    }

    public function availableSlots(): int
    {
        return max(0, $this->quota - $this->enrolledCount());
    }
}
