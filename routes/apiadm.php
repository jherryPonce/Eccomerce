<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return 'adm';
});




 Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
}); 

// Route::group(['prefix' => 'v1'], function () {
//     // Configuración del Sistema
//     Route::group(['prefix' => 'settings'], function () {
//         Route::get('/', [SettingController::class, 'index']);
//         Route::put('/', [SettingController::class, 'update']);
//         Route::post('maintenance-mode', [SettingController::class, 'toggleMaintenance']);
//     });
    
//     // Gestión de Roles y Permisos
//     Route::resource('roles', RoleController::class);
//     Route::resource('permissions', PermissionController::class);
    
//     // Logs y Monitoreo
//     Route::get('logs', [LogController::class, 'index']);
//     Route::get('system-health', [SystemController::class, 'health']);
    
//     // Backup y Restauración
//     Route::post('backups', [BackupController::class, 'create']);
//     Route::get('backups', [BackupController::class, 'index']);
    
//     // Gestión de Promociones
//     Route::resource('promotions', PromotionController::class);
//     Route::post('promotions/{promotion}/activate', [PromotionController::class, 'activate']);
// });