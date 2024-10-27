<?php

use Illuminate\Support\Facades\Route;

Route::group(['namespace' => 'User'], function (){
    Route::get('/', [\App\Http\Controllers\User\IndexController::class, '__invoke'])->name('index');

    Route::get('/user', [\App\Http\Controllers\User\CreateController::class, '__invoke'])->name('create');
    Route::post('/user', [\App\Http\Controllers\User\StoreController::class, '__invoke'])->name('store');

    Route::get('/user/{user}', [\App\Http\Controllers\User\ShowController::class, '__invoke'])->name('show');

    Route::delete('/user/{user}', [\App\Http\Controllers\User\DestroyController::class, '__invoke'])->name('delete');

    Route::get('/user/{user}/edit', [\App\Http\Controllers\User\EditController::class, '__invoke'])->name('edit');
    Route::patch('/user/{user}', [\App\Http\Controllers\User\UpdateController::class, '__invoke'])->name('update');
});



Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
