<?php

namespace App\Http\Middleware;

use Closure;

class CheckIfProfileExists
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
        // dd($request->user()->profile->first_name);
        if ($request->user()->profile == null) {
            return redirect('/profile/edit');
        }
        return $next($request);
    }
}
