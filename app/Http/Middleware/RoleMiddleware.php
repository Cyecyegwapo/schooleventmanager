<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Add your role-checking logic here
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request);
        }

        // Redirect or return an error if the user doesn't have the required role
        return redirect('/home'); // Or wherever you want to redirect
    }
}
