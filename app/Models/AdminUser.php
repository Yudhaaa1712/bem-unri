<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

class AdminUser extends Model
{
    use HasFactory;

    protected $table = 'admin_users'; // Pastikan nama table benar

    protected $fillable = [
        'name',
        'username', 
        'email',
        'password',
        'is_active',
        'last_login'
    ];

    protected $hidden = [
        'password',
    ];

    protected $casts = [
        'is_active' => 'boolean',
        'last_login' => 'datetime',
    ];

    /**
     * Check if the provided password matches the user's password
     */
    public function checkPassword($password)
    {
        // Jika password di database sudah di-hash
        if (Hash::check($password, $this->password)) {
            return true;
        }
        
        // Jika password masih plain text (untuk development)
        if ($password === $this->password) {
            return true;
        }
        
        return false;
    }

    /**
     * Set password attribute (auto hash)
     */
    public function setPasswordAttribute($password)
    {
        $this->attributes['password'] = Hash::make($password);
    }

    /**
     * Scope untuk admin aktif
     */
    public function scopeActive($query)
    {
        return $query->where('is_active', true);
    }
}