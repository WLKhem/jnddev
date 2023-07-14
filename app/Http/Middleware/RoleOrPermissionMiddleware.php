<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Exceptions\UnauthorizedException;

class RoleOrPermissionMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next, ...$rolesOrPermissions)
    {
        // Check if the user is authenticated
        if (!Auth::check()) {
            return redirect('/');
        }

        // Get the authenticated user
        $user = Auth::user();

        // Check if the user has any of the specified roles or permissions
        foreach ($rolesOrPermissions as $roleOrPermission) {
            if ($user->hasRole($roleOrPermission) || $user->hasPermission($roleOrPermission)) {
                return $next($request);
            }
        }

        // Unauthorized access
        return abort(403, 'Unauthorized');
    }
}
