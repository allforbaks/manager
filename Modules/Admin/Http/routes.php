<?php

use Modules\Admin\Http\Controllers\AdminController;

Route::group(['middleware' => 'web', 'prefix' => 'admin'], function()
{
    Route::get('/users', ['uses' => 'Modules\Admin\Http\Controllers\AdminController@indexUser', 'middleware' => 'roles', 'roles' => ['Admin']])->name('admin.user');
    Route::get('/projects', [AdminController::class, 'indexProject'])->name('admin.project');
    Route::delete('/users/{user}', [AdminController::class, 'destroyUser'])->name('admin.user.delete');
    Route::delete('/projects/{project}', [AdminController::class, 'destroyProject'])->name('admin.project.delete');
    Route::get('/prices', [AdminController::class, 'show'])->name('admin.price');
    Route::post('', [AdminController::class, 'update'])->name('update.prices');
});
