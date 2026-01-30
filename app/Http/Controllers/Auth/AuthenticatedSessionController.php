<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

/**
 * ==========================================================================
 * CONTROLADOR: AUTENTICACIÓN (Sesión)
 * ==========================================================================
 * Propósito:
 * - Gestiona el ciclo de vida de la sesión (Login y Logout).
 * - Controla la redirección y regeneración de seguridad de la sesión.
 * 
 * Funcionalidad Extra:
 * - Sistema de "Flash Session" para efectos de sonido en el Dashboard.
 */

class AuthenticatedSessionController extends Controller
{
    /**
     * Muestra la vista de inicio de sesión.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Gestiona una solicitud de autenticación entrante.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        // Flash 'login_success': Crea una variable temporal de sesión.
        // El Dashboard detectará esta variable para reproducir el sonido de bienvenida.
        // Al ser 'flash', se borra automáticamente tras la siguiente recarga.
        session()->flash('login_success', true);

        return redirect()->intended(route('dashboard', absolute: false));
    }

    /**
     * Destruye una sesión autenticada (Cerrar sesión).
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
