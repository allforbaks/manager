<?php

Route::group(['middleware' => 'web', 'namespace' => 'Modules\Profile\Http\Controllers'], function()
{
    Route::resource('profile', 'ProfileController');
});
