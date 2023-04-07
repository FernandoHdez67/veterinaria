<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class VeterinarioMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::user()->role != 'veterinario') {
            abort(403);
        }

        return $next($request);
    }
}