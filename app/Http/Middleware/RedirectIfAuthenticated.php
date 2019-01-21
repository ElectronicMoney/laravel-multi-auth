<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\AuthenticationException;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|null  $guard
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {

        switch ($guard) {
            case 'admin':
                //if Auth is an admin
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('get.admin.dashboard');
                }
                break;
            default:
                //if the Auth user is not an admin
                if (Auth::guard($guard)->check()) {
                    return redirect()->route('get.user.dashboard');
                }
                break;
        }

        return $next($request);

    }
}
