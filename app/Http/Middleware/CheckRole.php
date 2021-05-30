<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    public function handle($request, Closure $next, ...$roles)
    {
        $role = auth()->user()->role->role_name;
        if (!in_array($role, $roles)) return redirect('/admin');
        return $next($request);
    }
}
