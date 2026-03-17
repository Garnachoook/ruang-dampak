<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

use Illuminate\Support\Str;

class Program extends Model
{
    use HasFactory, HasUuids;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'type',
        'thumbnail_url',
        'price',
        'original_price',
        'category',
        'is_published',
        'created_by',
        'learning_path_id',
    ];

    protected $casts = [
        'price' => 'decimal:2',
        'original_price' => 'decimal:2',
        'is_published' => 'boolean',
    ];

    public function hasDiscount(): bool
    {
        return $this->original_price && $this->original_price > $this->price;
    }

    public function mentorReviews(): HasManyThrough
    {
        return $this->hasManyThrough(MentorReview::class, Batch::class);
    }

    protected static function booted(): void
    {
        static::saving(function (Program $model) {
            if (empty($model->slug)) {
                $model->slug = Str::slug($model->title);
            }
        });
    }

    public function learningPath()
    {
        return $this->belongsTo(LearningPath::class);
    }

    public function creator()
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function batches()
    {
        return $this->hasMany(Batch::class);
    }

    public function modules()
    {
        return $this->hasMany(Module::class);
    }

    public function scopePublished(Builder $query): Builder
    {
        return $query->where('is_published', true);
    }
}
