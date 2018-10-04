<?php

Route::get('profile/{user}', 'Modules\Profile\Http\Controllers\ProfileController@show')->name('profile.show')->middleware('web');
Route::put('profile/{user}', 'Modules\Profile\Http\Controllers\ProfileController@update')->name('profile.update')->middleware('web');