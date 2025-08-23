<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\AdminUser;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;
use Exception;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        return view('admin.auth.login');
    }

    public function login(Request $request)
    {
        // Hanya log di development environment
        if (app()->environment('local', 'development')) {
            Log::info('Login attempt', [
                'username' => $request->input('username'),
                'ip' => $request->ip(),
                'user_agent' => $request->userAgent()
            ]);
        }

        try {
            $validated = $request->validate([
                'username' => 'required|string|min:3|max:255',
                'password' => 'required|string|min:1'
            ], [
                'username.required' => 'Username atau email harus diisi',
                'username.min' => 'Username minimal 3 karakter',
                'password.required' => 'Password harus diisi'
            ]);

            // Rate limiting untuk security
            $key = 'login_attempts:' . $request->ip();
            $attempts = cache($key, 0);
            
            if ($attempts >= 5) {
                Log::warning('Too many login attempts', [
                    'ip' => $request->ip(),
                    'attempts' => $attempts
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Terlalu banyak percobaan login. Coba lagi dalam 15 menit.'
                ], 429);
            }

            // Cari admin user
            $admin = AdminUser::where(function($query) use ($validated) {
                $query->where('username', $validated['username'])
                      ->orWhere('email', $validated['username']);
            })->where('is_active', true)->first();

            if (!$admin) {
                // Increment failed attempts
                cache([$key => $attempts + 1], now()->addMinutes(15));
                
                // Log failed attempt (tanpa username di production)
                if (app()->environment('local', 'development')) {
                    Log::warning('Login failed: User not found', [
                        'username' => $validated['username'],
                        'ip' => $request->ip()
                    ]);
                } else {
                    Log::warning('Login failed: User not found', [
                        'ip' => $request->ip()
                    ]);
                }
                
                return response()->json([
                    'success' => false,
                    'message' => 'Username/email atau password tidak valid'
                ], 422);
            }

            // Cek password
            if (!$admin->checkPassword($validated['password'])) {
                // Increment failed attempts
                cache([$key => $attempts + 1], now()->addMinutes(15));
                
                Log::warning('Login failed: Wrong password', [
                    'user_id' => $admin->id,
                    'ip' => $request->ip()
                ]);
                
                return response()->json([
                    'success' => false,
                    'message' => 'Username/email atau password tidak valid'
                ], 422);
            }

            // Reset failed attempts on successful login
            cache()->forget($key);

            // Update last login
            try {
                $admin->update(['last_login' => now()]);
            } catch (Exception $e) {
                // Silent fail - last_login is not critical
            }

            // Regenerate session untuk keamanan
            $request->session()->regenerate();

            // Set session
            session([
                'admin_user_id' => $admin->id,
                'admin_user_name' => $admin->name ?? $admin->username,
                'admin_username' => $admin->username,
                'admin_email' => $admin->email,
                'admin_login_time' => now()->timestamp
            ]);

            Log::info('Login successful', [
                'user_id' => $admin->id,
                'ip' => $request->ip()
            ]);

            // SECURE: Jangan return data user yang sensitif
            return response()->json([
                'success' => true,
                'message' => 'Login berhasil! Mengarahkan ke dashboard...',
                'redirect' => route('admin.dashboard')
                // Hapus 'user' data untuk keamanan
            ]);

        } catch (ValidationException $e) {
            // Increment failed attempts untuk validation error juga
            cache([$key => $attempts + 1], now()->addMinutes(15));
            
            if (app()->environment('local', 'development')) {
                Log::warning('Login validation failed', ['errors' => $e->errors()]);
            }
            
            $firstError = collect($e->errors())->flatten()->first();
            
            return response()->json([
                'success' => false,
                'message' => $firstError ?? 'Data tidak valid'
            ], 422);
            
        } catch (Exception $e) {
            Log::error('Login system error', [
                'error' => $e->getMessage(),
                'ip' => $request->ip()
            ]);
            
            return response()->json([
                'success' => false,
                'message' => 'Terjadi kesalahan sistem. Silakan coba lagi.'
            ], 500);
        }
    }

    public function logout(Request $request)
    {
        $adminUserId = session('admin_user_id');
        
        Log::info('Logout', [
            'user_id' => $adminUserId,
            'ip' => $request->ip()
        ]);
        
        // Hapus semua session admin
        $request->session()->forget([
            'admin_user_id', 
            'admin_user_name', 
            'admin_username',
            'admin_email',
            'admin_login_time'
        ]);
        
        // Regenerate session
        $request->session()->regenerate();
        
        if ($request->expectsJson()) {
            return response()->json([
                'success' => true,
                'message' => 'Logout berhasil',
                'redirect' => route('admin.login')
            ]);
        }
        
        return redirect()->route('admin.login')
            ->with('success', 'Anda telah logout dengan sukses');
    }
}