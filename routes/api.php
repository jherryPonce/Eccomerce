<?php

use App\Http\Controllers\Api\Admin\CnfProductos\CnfProductsController;
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

Route::get('/', function () {
    return 'api';
});
Route::get('/home', function () {
    return 'home';
});

Route::get('/product', [CnfProductsController::class , 'index'])->name('producto.list');

Route::post('/product', [CnfProductsController::class , 'store'])->name('producto.create');

// Route::prefix('admin')->group(function () {
//     return 'entra';
//     Route::post('/products', [CnfProductsController::class, 'store']);
//     // Otras rutas para productos en el grupo
// });