<?php

use App\Http\Controllers\ChoreController;
use Illuminate\Support\Facades\Route;

// RUTA PARA ENRUTAR /user/
Route::middleware(['auth'])->group(function(){
    Route::put('/{id}', [ChoreController::class, 'updateStatus'])->name('chore.updateStatus');
    Route::delete('/{id}', [ChoreController::class, 'delete'])->name('chore.delete');
    
    // Prueba de ruta protegida /chores/rutaProtegida
    Route::get('/rutaProtegida', function() {
        return view('viewProtegida');
    });
});

// Prueba de no protegida
Route::get('/rutaNoProtegida', function() {
    return view('viewNoProtegida');
});