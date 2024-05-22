<?php

use App\Http\Controllers\PageController;
use App\Http\Controllers\ProdController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

// user
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/products/create', [ProdController::class, 'create'])->name('prods.create');
    Route::post('/products', [ProdController::class, 'store'])->name('prods.store');
    Route::put('/products/{id}', [ProdController::class, 'update'])->name('prods.update');
    Route::delete('/products/{id}', [ProdController::class, 'destroy'])->name('prods.destroy');
});

// guest 
Route::get('/', [PageController::class, 'homepage'])->name('homepage');
Route::get('/about', [PageController::class, 'about'])->name('about');
Route::get('/products', [ProdController::class, 'index'])->name('prods.index');
Route::get('/products/{id}', [ProdController::class, 'show'])->name('prods.show');
Route::get('/products/edit/{id}', [ProdController::class, 'edit'])->name('prods.edit');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');


require __DIR__ . '/auth.php';
