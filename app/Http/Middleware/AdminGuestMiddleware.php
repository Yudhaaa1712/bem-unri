<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminGuestMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if (session('admin_user_id')) {
            return redirect()->route('admin.dashboard');
        }

        return $next($request);
    }
}