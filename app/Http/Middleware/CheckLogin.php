<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CheckLogin
{
    public function handle(Request $request, Closure $next)
    {
        if (!session()->has('nis') && !$request->is('login')) {
            return redirect('/login');
        }
        return $next($request);
    }
}

