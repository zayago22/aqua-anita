<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ContactController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ContactoAdminController;
use App\Http\Controllers\Admin\TestimonioController;
use App\Http\Controllers\Admin\ClaseController;
use Illuminate\Support\Facades\Route;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/privacidad', function () { return view('privacidad'); })->name('privacidad');

Route::post('/contacto', [ContactController::class, 'store'])->name('contacto.store');

// ===== ADMIN ROUTES =====
Route::middleware(['auth'])->prefix('admin')->name('admin.')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');

    // Contactos
    Route::get('/contactos', [ContactoAdminController::class, 'index'])->name('contactos.index');
    Route::delete('/contactos/{contacto}', [ContactoAdminController::class, 'destroy'])->name('contactos.destroy');

    // Testimonios
    Route::resource('testimonios', TestimonioController::class);

    // Clases
    Route::resource('clases', ClaseController::class);
    Route::delete('/clases-imagen/{imagen}', [ClaseController::class, 'destroyImagen'])->name('clases.imagen.destroy');
});

Route::get('/dashboard', function () {
    return redirect()->route('admin.dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
