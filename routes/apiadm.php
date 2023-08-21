<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::get('/', function () {
    return 'api_adm';
});


Route::get('/product', [CnfProductsController::class , 'index'])->name('producto.list');

// Route::post('/register',[AuthController::class, 'register']);
// Route::post('/login',[AuthController::class, 'login']);

// Route::group(['middleware'=>['auth:sanctum']], function(){

//     //user
//     Route::post('/user',[AuthController::class, 'user']);
//     Route::post('/logout',[AuthController::class, 'logout']);
// });



//  Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// }); 