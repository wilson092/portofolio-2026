<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\ContactController;

/* NOTE: Do Not Remove
/ Livewire asset handling if using sub folder in domain
*/

Livewire::setUpdateRoute(function ($handle) {
    return Route::post(config('app.asset_prefix') . '/livewire/update', $handle);
});

Livewire::setScriptRoute(function ($handle) {
    return Route::get(config('app.asset_prefix') . '/livewire/livewire.js', $handle);
});

/*
/ END
*/

/*
|--------------------------------------------------------------------------
| Home
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
})->name('home');

/*
|--------------------------------------------------------------------------
| Projek
|--------------------------------------------------------------------------
*/

// Halaman daftar projek
Route::get('/projek', [ProjekController::class, 'index'])
    ->name('projek.index');

// Halaman detail projek
Route::get('/projek/{id}', [ProjekController::class, 'show'])
    ->name('projek.show');

