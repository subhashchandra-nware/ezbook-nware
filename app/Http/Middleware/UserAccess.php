<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

use function Laravel\Prompts\error;

class UserAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, $userType): Response
    {
        // dd(auth()->user(), auth()->user()->AdminLevel, $userType);
        if (auth()->user() && auth()->user()->type == $userType) {
            return $next($request);
        }
        // error(404);
        abort(404, "Access denied.");
        return response()->json(["Access denied."]);
    }
}
