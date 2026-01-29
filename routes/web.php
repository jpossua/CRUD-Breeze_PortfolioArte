<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ObraController;
use App\Http\Controllers\ProfileController;

/*
|--------------------------------------------------------------------------
| RUTAS WEB
|--------------------------------------------------------------------------
|
| Aquí se registran las rutas de la aplicación web.
| Estas rutas son cargadas por el RouteServiceProvider y todas ellas
| tienen asignado el grupo de middleware "web".
|
| Estructura:
| 1. Rutas Públicas (Landing)
| 2. Rutas de Autenticación (Breeze)
| 3. Rutas Protegidas (Dashboard, Perfil, CRUD)
*/

// ============================================
// SECCIÓN 1: RUTAS PÚBLICAS
// ============================================

/**
 * Página de bienvenida.
 */
Route::get('/', function () {
    return view('welcome');
});

// ============================================
// SECCIÓN 2: RUTAS DE AUTENTICACIÓN
// ============================================

/**
 * Rutas generadas por Laravel Breeze.
 * Incluye login, registro, reseteo de contraseña, etc.
 */
require __DIR__ . '/auth.php';

// ============================================
// SECCIÓN 3: RUTAS PROTEGIDAS (Requieren Autenticación)
// ============================================

/**
 * Dashboard principal.
 * Requiere que el usuario esté autenticado y verificado.
 */
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

/**
 * Grupo de rutas que requieren autenticación.
 */
Route::middleware('auth')->group(function () {

    // Gestión de perfil de usuario
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de Obras
    // Route::resource genera automáticamente las 7 rutas estándar (index, create, store, show, edit, update, destroy)
    Route::resource('obras', ObraController::class);
});
