<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthEZB
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, String $userType): Response
    {
        if(auth()->user() && auth()->user()->AdminLevel == $userType)
        {
            return $next($request);
        }
        abort(404, "Access denied.");
        return response()->json(["Access denied."]);
        // return redirect(RouteServiceProvider::ADMIN_HOME);
        // return response()->json(["You don't have permission to access for this page."]);
    }
}
