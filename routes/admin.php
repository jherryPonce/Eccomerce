<?php

use App\Http\Controllers\Api\Admin\Activos\CnfProductsController;
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


Route::group(['prefix' => 'v1'], function () {
    Route::middleware(['auth:sanctum'])->group(function () {
        Route::middleware(['role:admin'])->group(function () {
            // Gestión de Productos
            Route::group(['prefix' => 'products'], function () {

                Route::get('/', [CnfProductsController::class, 'index']);
                Route::get('/{slug}', [CnfProductsController::class, 'show']);
                Route::post('/create', [CnfProductsController::class, 'store'])->name('adm.producto.store')->middleware('transaction');
                Route::put('{product}', [CnfProductsController::class, 'update'])->name('adm.producto.update')->middleware('transaction');
                Route::delete('{product}', [CnfProductsController::class, 'destroy'])->name('adm.producto.destroy')->middleware('transaction');
                Route::get('export', [CnfProductsController::class, 'export']);
                Route::post('import', [CnfProductsController::class, 'import']); //aun falta
            });


            // // Gestión de Categorías
            // Route::resource('categories', AdminCategoryController::class);

            // // Gestión de Órdenes
            // Route::group(['prefix' => 'orders'], function () {
            //     Route::get('/', [AdminOrderController::class, 'index']);
            //     Route::get('{order}', [AdminOrderController::class, 'show']);
            //     Route::put('{order}/status', [AdminOrderController::class, 'updateStatus']);
            //     Route::get('statistics', [AdminOrderController::class, 'statistics']);
            // });

            // // Gestión de Usuarios
            // Route::resource('users', AdminUserController::class);

            // // Gestión de Inventario
            // Route::group(['prefix' => 'inventory'], function () {
            //     Route::get('/', [InventoryController::class, 'index']);
            //     Route::put('update-stock', [InventoryController::class, 'updateStock']);
            //     Route::get('low-stock', [InventoryController::class, 'lowStock']);
            // });

            // // Reportes y Estadísticas
            // Route::group(['prefix' => 'reports'], function () {
            //     Route::get('sales', [ReportController::class, 'sales']);
            //     Route::get('revenue', [ReportController::class, 'revenue']);
            //     Route::get('customers', [ReportController::class, 'customers']);
            // });
        });
    });
});
