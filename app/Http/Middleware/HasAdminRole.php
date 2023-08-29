<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasAdminRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            if (Auth::user()->role_id == 1) return $next($request);

            return redirect()->route('admin/login/get')->withErrors(['role' => 'Access denied! You are not an Admin!']);
        }

        return redirect()->route('admin/login/get')->withErrors(['login' => "Please login!"]);
    }
}