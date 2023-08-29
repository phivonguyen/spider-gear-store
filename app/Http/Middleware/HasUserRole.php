<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class HasUserRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check() && Auth::user()->role_id == 2) {
            if (Auth::user()->status == "Active") return $next($request);
            if (Auth::user()->status == "Inactive") return redirect()->route('user/login/get')->withErrors(['status' => "You are banned from this store!"]);
        }

        return redirect()->route('user/login/get')->withErrors(['login' => "Please login to continue"]);
    }
}
