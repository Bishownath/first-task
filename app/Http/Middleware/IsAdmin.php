<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->check_role === 'admin') {
            return $next($request);
        }
        // abort(403);
        return redirect('home')
            ->with([
                'error' => "You don't have access to this page."
            ]);
    }
}
