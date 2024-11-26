<?php


// Route::group(['prefix' => 'v1'], function () {
//     // Perfil de Usuario
//     Route::get('profile', [ProfileController::class, 'show']);
//     Route::put('profile', [ProfileController::class, 'update']);
    
//     // Carrito de Compras
//     Route::group(['prefix' => 'cart'], function () {
//         Route::get('/', [CartController::class, 'show']);
//         Route::post('items', [CartController::class, 'addItem']);
//         Route::put('items/{id}', [CartController::class, 'updateItem']);
//         Route::delete('items/{id}', [CartController::class, 'removeItem']);
//     });

// Route::middleware(['cart.session'])->group(function () {
//     Route::get('cart', [CartController::class, 'show']);
//     Route::post('cart/items', [CartController::class, 'addItem']);
// });
    
//     // Órdenes/Pedidos
//     Route::group(['prefix' => 'orders'], function () {

//         Route::get('/', [OrderController::class, 'index']);
//         Route::post('/', [OrderController::class, 'store']);
//         Route::get('{order}', [OrderController::class, 'show']);
//         Route::post('{order}/cancel', [OrderController::class, 'cancel']);
//     })->middleware('payment.verify'); //si el midelware va solo a la creacion de ´pago bo a tofdos
    
//     // Direcciones de Envío
//     Route::resource('addresses', AddressController::class);
    
//     // Wishlist
//     Route::resource('wishlist', WishlistController::class);
    
//     // Pagos
//     Route::post('payments', [PaymentController::class, 'process']);
//     Route::get('payments/history', [PaymentController::class, 'history']);
// });