<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class SuperAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }else if (auth()->user()->role == 1) {
            return redirect()->route('admin');
        }else if (auth()->user()->role == 0) {
            return redirect()->route('user');
        }else if (auth()->user()->role == 2) {
            return $next($request);
        }
        // return $next($request);
    }
}
