<?php
//Route::group(['middleware' => 'web', 'namespace' => 'Modules\Projects\Http\Controllers'], function()
//{
//    Route::resource('projects', 'ProjectController');
//});

Route::get('projects', 'Modules\Projects\Http\Controllers\ProjectController@index')->name('project.index')->middleware('web');                          //список всех проектов
Route::get('projects/create', 'Modules\Projects\Http\Controllers\ProjectController@create')->name('project.create')->middleware('web');                 //создание нового проекта
Route::post('projects', 'Modules\Projects\Http\Controllers\ProjectController@store')->name('project.store')->middleware('web');                         //сохранение нового проекта
Route::get('projects/{project}', 'Modules\Projects\Http\Controllers\ProjectController@show')->name('project.show')->middleware('web');                  //показ одного проекта
Route::get('projects/{project}/edit', 'Modules\Projects\Http\Controllers\ProjectController@edit')->name('project.edit')->middleware('web');             //редактирование проекта
Route::put('projects/{project}', 'Modules\Projects\Http\Controllers\ProjectController@update')->name('project.update')->middleware('web');              //обноление проекта
Route::delete('projects/{project}', 'Modules\Projects\Http\Controllers\ProjectController@destroy')->name('project.destroy')->middleware('web');         //удаление проекта