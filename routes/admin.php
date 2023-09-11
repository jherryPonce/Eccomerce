<?php

use App\Http\Controllers\Api\Admin\CnfProductos\CnfProductsController;
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
    return 'admin';
});

// Route::post('/product', [CnfProductsController::class , 'store'])->name('producto.create');

// Route::get('/product', [CnfProductsController::class , 'index'])->name('producto.list');