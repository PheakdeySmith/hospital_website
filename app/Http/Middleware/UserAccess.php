<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string  $userType
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $userType)
    {
        if (auth()->user()->type == $userType) {
            return $next($request);
        }

        // Return a 403 Forbidden response when the user does not have permission
        abort(403, 'You do not have permission to access this page for user type: ' . $userType);
    }
}
