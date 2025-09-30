<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Symfony\Component\HttpFoundation\Response;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $role = null): Response
    {
        $user = $request->user();
        if (!$user) {
            abort(403, 'Unauthorized (not logged in)');
        }

        $userRole = $user->role ?: 'user';

        if ($role && $userRole !== $role) {
            abort(403, 'Unauthorized (role required: ' . $role . ')');
        }

        return $next($request);
    }
}
