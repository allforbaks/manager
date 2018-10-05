<?php
//Route::get('project', 'Modules\Project\Http\Controllers\ProjectController@index')->name('project.index')->middleware('web');                          //список всех проектов
//Route::get('project/create', 'Modules\Project\Http\Controllers\ProjectController@create')->name('project.create')->middleware('web');                 //создание нового проекта
//Route::post('project', 'Modules\Project\Http\Controllers\ProjectController@store')->name('project.store')->middleware('web');                         //сохранение нового проекта
//Route::get('project/{project}', 'Modules\Project\Http\Controllers\ProjectController@show')->name('project.show')->middleware('web');                  //показ одного проекта
//Route::get('project/{project}/edit', 'Modules\Project\Http\Controllers\ProjectController@edit')->name('project.edit')->middleware('web');             //редактирование проекта
//Route::put('project/{project}', 'Modules\Project\Http\Controllers\ProjectController@update')->name('project.update')->middleware('web');              //обноление проекта
//Route::delete('project/{project}', 'Modules\Project\Http\Controllers\ProjectController@destroy')->name('project.destroy')->middleware('web');         //удаление проекта


Route::get('task/create', 'Modules\Task\Http\Controllers\TaskController@create')->name('task.create')->middleware('web');           //создание задачи
Route::post('task', 'Modules\Task\Http\Controllers\TaskController@store')->name('task.store')->middleware('web');                   //coхранение задачи