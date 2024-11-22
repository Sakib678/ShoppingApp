<?php

use Illuminate\Http\Request; 
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProductController;
use Illuminate\Support\Facades\Route;

/*Route::get('/', function () {
    return view('welcome');
});*/
Route::get('/', [ProductController::class, 'index'])->name('home');
Route::get('/product/{id}', [ProductController::class, 'show']);
Route::get('/product/create', [ProductController::class, 'create']);
Route::get('/product/{id}/edit', [ProductController::class, 'edit']);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
