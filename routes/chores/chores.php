<?php

use App\Http\Controllers\ChoreController;
use Illuminate\Support\Facades\Route;

// RUTA PARA ENRUTAR /user/
Route::put('/{id}', [ChoreController::class, 'updateStatus'])->name('chore.updateStatus');
Route::delete('/{id}', [ChoreController::class, 'delete'])->name('chore.delete');
