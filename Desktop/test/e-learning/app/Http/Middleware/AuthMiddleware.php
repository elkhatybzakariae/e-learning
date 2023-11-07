<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */

    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            // if (
            //     auth()->user()->roles->contains('role_name', 'superadmin') ||
            //     auth()->user()->roles->contains('role_name', 'moderateur')
            //     || auth()->user()->roles->contains('role_name', 'formateur')
            // ) {

                return $next($request);
            // }
            // else{
            //     return redirect()->route('index');
            // }
        }

        return redirect()->route('loginpage'); // Redirect to the login page if not authenticated
    }
}
