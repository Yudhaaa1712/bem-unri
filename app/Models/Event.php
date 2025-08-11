<?php
// app/Models/Event.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'event_date',
        'time',
        'location',
        'is_active'
    ];

    protected $casts = [
        'event_date' => 'date',
        'is_active' => 'boolean'
    ];

    // Scope untuk events yang aktif
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }

    // Scope untuk events berdasarkan tanggal
    public function scopeByDate($query, $date)
    {
        return $query->where('event_date', $date);
    }

    // Scope untuk events bulan ini
    public function scopeThisMonth($query)
    {
        return $query->whereMonth('event_date', now()->month)
                    ->whereYear('event_date', now()->year);
    }

    // Format tanggal untuk display
    public function getFormattedDateAttribute()
    {
        return $this->event_date->format('d F Y');
    }
}