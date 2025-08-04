<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Casts\Attribute;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'excerpt',
        'content',
        'category',
        'author',
        'image',
        'views',
        'tags',
        'is_published',
        'published_at'
    ];

    protected $casts = [
        'tags' => 'array',
        'is_published' => 'boolean',
        'published_at' => 'datetime'
    ];

    protected $appends = ['formatted_date'];

    public function incrementViews()
    {
        $this->increment('views');
    }

    public function isPublished(): bool
    {
        return $this->is_published && $this->published_at?->isPast();
    }

    protected function formattedDate(): Attribute
    {
        return Attribute::make(
            get: fn () => $this->created_at->format('Y-m-d')
        );
    }

    public function scopePublished($query)
    {
        return $query->where('is_published', true)
                    ->where('published_at', '<=', now());
    }

    public function scopeByCategory($query, $category)
    {
        return $query->where('category', $category);
    }

    public function scopeSearch($query, $search)
    {
        return $query->where(function ($q) use ($search) {
            $q->where('title', 'like', "%{$search}%")
              ->orWhere('excerpt', 'like', "%{$search}%")
              ->orWhere('author', 'like', "%{$search}%");
        });
    }
}