<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ApiSecurity
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
         // Agregar headers de seguridad
         $response = $next($request);
        
         return $response->withHeaders([
             'X-Content-Type-Options' => 'nosniff',
             'X-Frame-Options' => 'DENY',
             'X-XSS-Protection' => '1; mode=block',
             'Strict-Transport-Security' => 'max-age=31536000; includeSubDomains',
             'Content-Security-Policy' => "default-src 'self'"
         ]);
    }
}
