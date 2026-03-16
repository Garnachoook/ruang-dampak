<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assignment extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'batch_id',
        'created_by',
        'title',
        'description',
        'deadline',
        'max_score',
        'allow_resubmit',
    ];

    protected $casts = [
        'deadline' => 'datetime',
    ];

    public function batch()
    {
        return $this->belongsTo(Batch::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function submissions()
    {
        return $this->hasMany(Submission::class);
    }

    public function isOverdue(): bool
    {
        return now()->greaterThan($this->deadline);
    }
}
