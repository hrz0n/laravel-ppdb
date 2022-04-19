<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class loginLevel
{
    public function handle(Request $request, Closure $next, ...$levels)
    {
        if (in_array($request->user()->level, $levels))
        {
            return $next($request);
        }
        return redirect('/');
    }
}
