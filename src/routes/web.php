<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\ProjekController;
use App\Http\Controllers\ContactController;
use App\Models\Kontak;
use App\Models\Projek;
use App\Http\Controllers\PesanController;
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
    $profil = Kontak::first();
    $projeks = Projek::all();
    
    return view('welcome', compact('profil', 'projeks'));
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

Route::post(
    '/kontak',
    [PesanController::class, 'store']
)->name('kontak.store');