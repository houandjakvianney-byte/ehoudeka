<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\VehicleController;
use App\Http\Controllers\TripController;
use Illuminate\Support\Facades\Route;

// 1. Page d'accueil publique 
    Route::get('/', [TripController::class, 'index'])->name('home');

// 2. Redirection du dashboard par défaut vers le profil
    Route::get('/dashboard', fn () => redirect()->route('profile.show'))
    ->middleware(['auth'])
    ->name('dashboard');


    Route::middleware('auth')->group(function () {

    //  Profil 
    Route::get('/profil', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/profil/modifier', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profil', [ProfileController::class, 'update'])->name('profile.update');

    //  Véhicule 
    Route::get('/vehicule', [VehicleController::class, 'show'])->name('vehicle.show');
    Route::get('/vehicule/creer', [VehicleController::class, 'create'])->name('vehicle.create');
    Route::post('/vehicule', [VehicleController::class, 'store'])->name('vehicle.store');
    // Modification du véhicule
    Route::get('/vehicule/modifier', [VehicleController::class, 'edit'])
    ->name('vehicle.edit');

    Route::patch('/vehicule', [VehicleController::class, 'update'])
    ->name('vehicle.update');

    // Trajets
    Route::get('/trajets/mes-trajets', [TripController::class, 'mine'])->name('trips.mine');
    Route::get('/trajets/creer', [TripController::class, 'create'])->name('trips.create');
    Route::post('/trajets', [TripController::class, 'store'])->name('trips.store');
    Route::get('/trajets/{trip}', [TripController::class, 'show'])->name('trips.show');
    Route::delete('/trajets/{trip}', [TripController::class, 'destroy'])->name('trips.destroy');
});

// Breeze
require __DIR__.'/auth.php';