<?php

namespace App\Http\Middleware;

use App\Exceptions\InvalidTokenException;
use App\Exceptions\TokenMissingException;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AuthenticateApi
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->bearerToken()) {
            throw new TokenMissingException();
        }

        try {
            if (!$request->user()) {
                throw new InvalidTokenException();
            }
        } catch (\Exception $e) {
            throw new InvalidTokenException();
        }

        return $next($request);
    }
}
