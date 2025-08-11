<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'username', 
        'email',
        'password',
        'is_active',
        'last_login'
    ];

    protected $hidden = [
        'password'
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login' => 'datetime'
    ];

    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = Hash::make($value);
    }

    public function checkPassword($password)
    {
        return Hash::check($password, $this->password);
    }

    public function updateLastLogin()
    {
        $this->update(['last_login' => now()]);
    }

    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}