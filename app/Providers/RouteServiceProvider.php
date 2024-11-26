<?php

namespace App\Providers;

use Illuminate\Cache\RateLimiting\Limit;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\RateLimiter;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/home';

    // En RouteServiceProvider
    protected array $middlewareGroups = [
        'api.public' => [
            'api',
            'throttle:60,1',
        ],
        'api.client' => [
            'api',
            'auth:sanctum',
            'role:client',
            'throttle:90,1',
            'verified',
        ],
        'api.admin' => [
            'api',
            'auth:sanctum',
            'role:admin',
            'throttle:120,1',
            'verified',
        ],
        'api.admingeneral' => [
            'auth:sanctum',
            'role:admingeneral',
            'throttle:120,1',
            'verified',
        ],
    ];

    public function boot()
    {
        $this->configureRateLimiting();

        $this->routes(function () {
            // Rutas para el administrador
            Route::prefix('admin')
                ->middleware($this->middlewareGroups['api.admin'])
                ->namespace($this->namespace . '\Admin')
                ->group(base_path('routes/admin.php'));

            // Rutas para el cliente
            Route::prefix('client')
                ->middleware($this->middlewareGroups['api.client'])
                ->namespace($this->namespace . '\Client')
                ->group(base_path('routes/client.php'));

            // Rutas de acceso público
            Route::middleware($this->middlewareGroups['api.public'])
                ->namespace($this->namespace)
                ->group(base_path('routes/api.php'));

            // Rutas para administración adicional
            Route::prefix('adm')
                ->middleware($this->middlewareGroups['api.admingeneral'])
                ->namespace($this->namespace . '\Admin')
                ->group(base_path('routes/apiadm.php'));
        });
    }

    protected function configureRateLimiting(): void
    {
        RateLimiter::for('api', function (Request $request) {
            return Limit::perMinute(60)
                ->by($request->user()?->id ?: $request->ip())
                ->response(function (Request $request, array $headers) {
                    return response('Too Many Requests', 429, $headers);
                });
        });

        // Rate limits específicos para diferentes roles
        RateLimiter::for('api.admin', function (Request $request) {
            return Limit::perMinute(120)->by($request->user()?->id?: $request->ip());
        });
    }
}
