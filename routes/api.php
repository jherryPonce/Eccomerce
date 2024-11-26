<?php

use App\Http\Controllers\Api\Api\AuthController;
use App\Http\Controllers\Api\Api\ProductsController;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/
//libres
Route::get('/', function () {
    return 'api';
});


// Rutas públicas que no requieren autenticación
Route::group(['prefix' => 'v1'], function () {
    // Productos

    Route::get('products', [ProductsController::class, 'index']);
    Route::get('products/{slug}', [ProductsController::class, 'show']);
    // Route::get('categories', [CategoryController::class, 'index']);
    
    // Autenticación
    Route::post('login', [AuthController::class, 'login']);
    Route::post('register', [AuthController::class, 'register']);
    // Route::post('password/reset', [PasswordResetController::class, 'reset']);
    
    // // Búsqueda y filtros
    // Route::get('search', [SearchController::class, 'index']);
    // Route::get('featured-products', [ProductController::class, 'featured']);
});



 Route::get('/login', function () {
    return 'logueaste p';
})->name('login');

// Route::prefix('admin')->group(function () {
//     return 'entra';
//     Route::post('/products', [CnfProductsController::class, 'store']);
//     // Otras rutas para productos en el grupo
// });