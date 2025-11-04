<?php

use App\Http\Controllers\AreaController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CharmController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/areas', [AreaController::class,'index'])->name('areas.index');
Route::get('/areas/create', [AreaController::class,'create'])->name('areas.create');
Route::get('/areas/{area}', [AreaController::class,'show'])->name('areas.show');
Route::post('/areas', [AreaController::class,'store'])->name('areas.store');

Route::get('/areas/{area}/edit', [AreaController::class, 'edit'])->name('areas.edit');
Route::put('/areas/{area}', [AreaController::class, 'update'])->name('areas.update');
Route::delete('/areas/{area}', [AreaController::class, 'destroy'])->name('areas.destroy');

require __DIR__.'/auth.php';

Route::resource('charms', CharmController::class);

Route::post('areas/{area}/charms', [CharmController::class, 'store'])->name('charms.store');