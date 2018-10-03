<?php
Route::group(['middleware' => 'web', 'namespace' => 'Modules\Projects\Http\Controllers'], function()
{
    Route::resource('projects', 'ProjectsController');
});
