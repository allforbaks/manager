<?php

use Modules\Project\Http\Controllers\{ProjectController,
    TaskController
};

Route::group(['middleware' => 'web', 'prefix' => 'projects'], function() {
    Route::get('', [ProjectController::class, 'index'])->name('project.index');
    Route::get('create', [ProjectController::class, 'create'])->name('project.create');
    Route::post('', [ProjectController:: class, 'store'])->name('project.store');
    Route::get('{project}', [ProjectController:: class, 'show'])->name('project.show');
    Route::get('{project}/edit', [ProjectController::class, 'edit'])->name('project.edit');
    Route::put('{project}', [ProjectController::class, 'update'])->name('project.update');
    Route::delete('{project}', [ProjectController::class, 'destroy'])->name('project.destroy');
    Route::get('{project}/task/add', [TaskController::class, 'create'])->name('task.add');
    Route::post('{project}', [TaskController::class, 'store'])->name('task.store');
});


