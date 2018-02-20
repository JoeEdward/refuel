<?php

namespace App\Http\Middleware;

use Closure;

class staffCheck
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
    if (auth()->check()) {
        if (\Auth::user()->type == 'student') {
            return redirect('failed');
        };
    };

        return $next($request);
    }
}
