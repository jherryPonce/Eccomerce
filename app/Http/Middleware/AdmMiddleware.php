<?php

namespace App\Http\Middleware;
use Spatie\Permission\Traits\HasRoles;

use Closure;
use Illuminate\Http\Request;

class AdmMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle($request, Closure $next)
    {
        
        if (!auth()->check() /* && auth()->user()->hasRoles('admin') */) {
            return $next($request);
        }

        // Si no tiene el rol de administrador, redirigir o retornar una respuesta
        // return redirect('/login'); ;

       
    }
}
