<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = [
        'name',
        'email',
        'password',
        'role',
        'avatar_url',
        'bio',
        'phone',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];

    // ── Relationships ──

    public function mentorProfile()
    {
        return $this->hasOne(MentorProfile::class);
    }

    public function mitraProfile()
    {
        return $this->hasOne(MitraProfile::class);
    }

    public function enrollments()
    {
        return $this->hasMany(Enrollment::class);
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function quizAttempts()
    {
        return $this->hasMany(QuizAttempt::class);
    }

    public function portfolios()
    {
        return $this->hasMany(Portfolio::class);
    }

    public function activityLogs()
    {
        return $this->hasMany(ActivityLog::class);
    }

    public function mentorBatches()
    {
        return $this->hasMany(Batch::class, 'mentor_id');
    }

    public function createdPrograms()
    {
        return $this->hasMany(Program::class, 'created_by');
    }

    public function givenReviews()
    {
        return $this->hasMany(MentorReview::class, 'reviewer_id');
    }

    public function jobListings()
    {
        return $this->hasMany(JobListing::class, 'mitra_id');
    }

    // ── Helpers ──

    public function isPeserta(): bool
    {
        return $this->role === 'peserta';
    }

    public function isMentor(): bool
    {
        return $this->role === 'mentor';
    }

    public function isMitra(): bool
    {
        return $this->role === 'mitra';
    }

    public function isAdmin(): bool
    {
        return $this->role === 'admin';
    }

    public function isActiveMentor(): bool
    {
        return $this->isMentor()
            && $this->mentorProfile
            && $this->mentorProfile->status === 'active';
    }

    public function currentStreak(): int
    {
        $dates = $this->activityLogs()
            ->select('logged_at')
            ->distinct()
            ->orderByDesc('logged_at')
            ->pluck('logged_at')
            ->map(fn ($d) => \Carbon\Carbon::parse($d)->startOfDay());

        if ($dates->isEmpty()) {
            return 0;
        }

        $streak = 0;
        $expected = now()->startOfDay();

        // If today has no activity, start from yesterday
        if (!$dates->first()->equalTo($expected)) {
            $expected = $expected->subDay();
        }

        foreach ($dates as $date) {
            if ($date->equalTo($expected)) {
                $streak++;
                $expected = $expected->subDay();
            } else {
                break;
            }
        }

        return $streak;
    }
}
