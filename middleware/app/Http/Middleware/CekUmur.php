<?php

namespace App\Http\Middleware;

use Closure;

class CekUmur
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
        if ($request->umur < 18) {
            return redirect()->back();
        }

        return $next($request);
    }
}
