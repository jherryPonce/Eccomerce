<?php

use App\Http\Controllers\Api\Admin\Activos\CnfProductsController;
use App\Http\Controllers\AuthController;
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
Route::get('/products', [CnfProductsController::class , 'index'])->name('producto.list');
Route::get('/product/{slug}', [CnfProductsController::class , 'show'])->name('producto.show');
Route::middleware(['auth'])->group(function(){ 


    Route::get('/home', function () {
        return 'home';
    });
    Route::post('/register',[AuthController::class, 'register']);
    



 });
 Route::get('/login', function () {
    return 'logueaste p';
})->name('login');

// Route::prefix('admin')->group(function () {
//     return 'entra';
//     Route::post('/products', [CnfProductsController::class, 'store']);
//     // Otras rutas para productos en el grupo
// });