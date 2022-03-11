<?php

namespace App\Http\Middleware;

use Closure;

class CheckPassword
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $headers = apache_request_headers();
        if(!isset($headers['api_password']) || $headers['api_password']!=="ase1iXcLAxanvXLZcgh6tk"){
            return response()->json(['message' => 'Unauthenticated.']);
        }
        return $next($request);
    }
}