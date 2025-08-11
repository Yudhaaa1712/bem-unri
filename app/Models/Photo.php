<?php
// app/Models/Photo.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Photo extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'is_active'
    ];

    protected $casts = [
        'is_active' => 'boolean'
    ];

    // Scope untuk photos yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}