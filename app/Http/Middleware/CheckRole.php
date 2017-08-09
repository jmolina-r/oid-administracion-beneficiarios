<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $role = null)
    {
        // Maybe you should change Auth for $request->user()
        if (!Auth::check()) {
            return redirect('/home');
        }
        // $actions = $request->route()->getAction();
        $roles = isset($role) ? explode('|', $role) : null;
        if (Auth::user()->hasAnyRole($roles) || !$roles) {
            return $next($request);
        }
        return redirect('/home');
    }
}
