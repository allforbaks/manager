<?php

use Modules\Admin\Http\Controllers\{UserController,
    ProjectController,
    PriceController
};

Route::group(['middleware' => ['web', 'roles'], 'prefix' => 'admin', 'roles' => ['Admin']], function()
{
    Route::get('/users', [UserController::class , 'show'])->name('admin.user');
    Route::get('/projects', [ProjectController::class, 'show'])->name('admin.project');
    Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('admin.user.delete');
    Route::delete('/projects/{project}', [ProjectController::class, 'destroy'])->name('admin.project.delete');
    Route::get('/prices', [PriceController::class, 'show'])->name('admin.price');
    Route::post('', [PriceController::class, 'update'])->name('update.prices');
});
