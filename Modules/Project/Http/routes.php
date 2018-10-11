<?php

use Modules\Project\Http\Controllers\{ProjectController,
    TaskController
};

Route::group(['middleware' => 'web'], function () {
    Route::resource('projects', ProjectController::class);
    Route::get('{project}/task/add', [TaskController::class, 'create'])->name('task.add');
    Route::post('{project}', [TaskController::class, 'store'])->name('task.store');
});


