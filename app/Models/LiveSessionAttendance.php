<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class LiveSessionAttendance extends Model
{
    use HasUuids;

    /**
     * Atribut yang dapat diisi secara massal.
     */
    protected $fillable = [
        'live_session_id', // Menghubungkan ke sesi live tertentu
        'user_id',         // Menghubungkan ke peserta yang hadir
        'joined_at',       // Waktu saat peserta bergabung ke sesi
    ];

    /**
     * Casting tipe data otomatis.
     */
    protected $casts = [
        'joined_at' => 'datetime',
    ];

    /**
     * Relasi ke model LiveSession.
     */
    public function liveSession(): BelongsTo
    {
        return $this->belongsTo(LiveSession::class);
    }

    /**
     * Relasi ke model User (Peserta).
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}