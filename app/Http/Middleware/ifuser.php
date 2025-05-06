<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Role;
use Auth;

class ifuser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
   public function handle(Request $request, Closure $next): Response
{
    if (Auth::check()) {
        $role = Role::find(Auth::user()->role_id);
        if ($role && $role->id == 2) {
            return $next($request);
        }
    }
    return redirect(url('/'));
}
    }

