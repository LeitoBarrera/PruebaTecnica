<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CocktailController;
use Illuminate\Support\Facades\Route;

// Ruta principal
Route::get('/', function () {
    return view('welcome');
});

// Dashboard (protección con autenticación y verificación)
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Rutas protegidas por autenticación
Route::middleware('auth')->group(function () {

    // Rutas de perfil de usuario
    Route::prefix('profile')->name('profile.')->group(function() {
        Route::get('/', [ProfileController::class, 'edit'])->name('edit');   // Editar perfil
        Route::patch('/', [ProfileController::class, 'update'])->name('update'); // Actualizar perfil
        Route::delete('/', [ProfileController::class, 'destroy'])->name('destroy'); // Eliminar perfil
    });

    // Rutas de cócteles
    Route::prefix('cocteles')->name('cocktails.')->group(function() {
        // Listado de cócteles
        Route::get('/', [CocktailController::class, 'index'])->name('index');
        // Crear nuevo cóctel
        Route::get('/crear', [CocktailController::class, 'create'])->name('create');
        Route::post('/', [CocktailController::class, 'store'])->name('store');
        
        // Ver cócteles guardados
        Route::get('/guardados', [CocktailController::class, 'saved'])->name('saved');
        
        // Editar y actualizar cócteles
        Route::get('/{id}/editar', [CocktailController::class, 'edit'])->name('edit');
        Route::put('/{id}', [CocktailController::class, 'update'])->name('update');
        
        // Eliminar cóctel
        Route::delete('/{id}', [CocktailController::class, 'destroy'])->name('destroy');
    });

});

// Rutas de autenticación
require __DIR__.'/auth.php';
