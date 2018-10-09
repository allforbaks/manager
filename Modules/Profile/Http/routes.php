<?php
use Modules\Profile\Http\Controllers\ProfileController;
use Modules\Profile\Http\Controllers\PaymentController;

Route::group(['middleware' => 'web', 'prefix' => 'profile'], function() {
    Route::get('{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('{user}/payment', [PaymentController::class, 'show'])->name('profile.payment');
    Route::post('{user}/pay', [PaymentController::class, 'store'])->name('payment.pay');

});