<?php

Route::get('profile/{user}', 'Modules\Profile\Http\Controllers\ProfileController@show')->name('profile.show')->middleware('web');               //профиль пользователя
Route::put('profile/{user}', 'Modules\Profile\Http\Controllers\ProfileController@update')->name('profile.update')->middleware('web');           //обновление данных пользователя
Route::delete('profile/{user}', 'Modules\Profile\Http\Controllers\ProfileController@destroy')->name('profile.destroy')->middleware('web');      //удаление профиля пользователя