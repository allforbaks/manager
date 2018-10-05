<?php

Route::get('projects', 'Modules\Project\Http\Controllers\ProjectController@index')->name('project.index')->middleware('web');
Route::get('projects/create', 'Modules\Project\Http\Controllers\ProjectController@create')->name('project.create')->middleware('web');
Route::post('projects', 'Modules\Project\Http\Controllers\ProjectController@store')->name('project.store')->middleware('web');
Route::get('projects/{project}', 'Modules\Project\Http\Controllers\ProjectController@show')->name('project.show')->middleware('web');
Route::get('projects/{project}/edit', 'Modules\Project\Http\Controllers\ProjectController@edit')->name('project.edit')->middleware('web');
Route::put('projects/{project}', 'Modules\Project\Http\Controllers\ProjectController@update')->name('project.update')->middleware('web');
Route::delete('projects/{project}', 'Modules\Project\Http\Controllers\ProjectController@destroy')->name('project.destroy')->middleware('web');
Route::get('projects/{project}/task/add', 'Modules\Project\Http\Controllers\TaskController@create')->name('task.add')->middleware('web');
Route::post('projects/{project}', 'Modules\Project\Http\Controllers\TaskController@store')->name('task.store')->middleware('web');
