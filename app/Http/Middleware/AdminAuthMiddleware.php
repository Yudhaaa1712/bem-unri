<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminAuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Cek apakah admin sudah login
        if (!session('admin_user_id')) {
            // Jika request AJAX atau API, return JSON
            if ($request->expectsJson() || $request->is('api/*')) {
                return response()->json([
                    'success' => false,
                    'message' => 'Unauthorized - Anda harus login sebagai admin',
                    'redirect' => route('admin.login')
                ], 401);
            }
            
            // Jika request normal, redirect ke login
            return redirect()->route('admin.login')->with('error', 'Silakan login terlebih dahulu');
        }

        return $next($request);
    }
}