<?php
use Modules\Profile\Http\Controllers\ProfileController;

Route::group(['middleware' => 'web', 'prefix' => 'profile'], function() {
    Route::get('{user}', [ProfileController::class, 'show'])->name('profile.show');
    Route::put('{user}', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('{user}', [ProfileController::class, 'destroy'])->name('profile.destroy');
});