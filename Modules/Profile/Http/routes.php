<?php
use Modules\Profile\Http\Controllers\{ProfileController, PaymentController};

Route::group(['middleware' => 'web', 'prefix' => 'profile'], function() {
    Route::get('{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('{user}/payment', [PaymentController::class, 'show'])->name('profile.payment');
    Route::post('/{user}/payment/cart', [PaymentController::class, 'cart'])->name('payment.cart');
    Route::post('{user}/pay', [PaymentController::class, 'store'])->name('payment.pay');
    Route::get('{user}/payment/result', [PaymentController::class, 'index'])->name('payment.result');

});