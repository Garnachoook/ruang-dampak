<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Module extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'program_id',
        'title',
        'content',
        'video_url',
        'order_index',
        'is_published',
    ];

    protected static function booted(): void
    {
        static::addGlobalScope('ordered', function ($query) {
            $query->orderBy('order_index');
        });
    }

    public function program()
    {
        return $this->belongsTo(Program::class);
    }

    public function quizzes()
    {
        return $this->hasMany(Quiz::class);
    }
}
