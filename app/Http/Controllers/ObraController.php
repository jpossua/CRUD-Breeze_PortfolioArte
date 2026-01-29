<?php

/**
 * ============================================
 * CONTROLADOR DE OBRAS (ObraController)
 * ============================================
 * 
 * Este controlador administra las operaciones CRUD para el modelo Obra.
 * Permite gestionar las obras de arte del portafolio del usuario.
 * 
 * Operaciones disponibles:
 * - Listar obras del usuario autenticado
 * - Registrar una nueva obra
 * - Ver detalles de una obra
 * - Actualizar información de una obra
 * - Eliminar una obra
 */

namespace App\Http\Controllers;

use App\Models\Obra;
use App\Http\Requests\StoreObraRequest;
use App\Http\Requests\UpdateObraRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ObraController extends Controller
{
    // ============================================
    // MÉTODO: INDEX (Listar obras)
    // ============================================

    /**
     * Muestra una lista de las obras del usuario autenticado.
     * 
     * @return \Illuminate\View\View Vista con el listado de obras
     */
    public function index()
    {
        // ============================================
        // PASO 1: OBTENER OBRAS DEL USUARIO
        // ============================================
        /**
         * Recuperamos las obras filtrando por el ID del usuario actual.
         * Ordenamos por las más recientes primero.
         */
        $obras = Obra::where('user_id', Auth::id())->latest()->get();
        return view('obras.index', compact('obras'));
    }

    // ============================================
    // MÉTODO: CREATE (Formulario de creación)
    // ============================================

    /**
     * Muestra el formulario para crear una nueva obra.
     * 
     * @return \Illuminate\View\View Vista del formulario de creación
     */
    public function create()
    {
        return view('obras.create');
    }

    // ============================================
    // MÉTODO: STORE (Guardar obra)
    // ============================================

    /**
     * Almacena una nueva obra en la base de datos.
     * 
     * @param StoreObraRequest $request Solicitud validada
     * @return \Illuminate\Http\RedirectResponse Redirección a index
     */
    public function store(StoreObraRequest $request)
    {
        // ============================================
        // PASO 1: OBTENER DATOS VALIDADOS
        // ============================================
        /**
         * Obtenemos los datos ya validados por el FormRequest.
         * Asignamos el usuario autenticado y procesamos el booleano 'visible'.
         */
        $data = $request->validated();
        $data['visible'] = $request->boolean('visible');
        $data['user_id'] = Auth::id();

        // ============================================
        // PASO 2: CREAR REGISTRO
        // ============================================
        Obra::create($data);

        return redirect()->route('obras.index')->with('success', 'Obra creada exitosamente');
    }

    // ============================================
    // MÉTODO: SHOW (Ver detalle)
    // ============================================

    /**
     * Muestra los detalles de una obra específica.
     * 
     * @param Obra $obra Modelo de la obra
     * @return \Illuminate\View\View Vista de detalles
     */
    public function show(Obra $obra)
    {
        // ============================================
        // PASO 1: VERIFICAR AUTORIZACIÓN
        // ============================================
        if ($obra->user_id !== Auth::id()) {
            abort(403, 'No Autorizado');
        }
        return view('obras.show', compact('obra'));
    }

    // ============================================
    // MÉTODO: EDIT (Formulario de edición)
    // ============================================

    /**
     * Muestra el formulario para editar una obra existente.
     * 
     * @param Obra $obra Modelo de la obra a editar
     * @return \Illuminate\View\View Vista del formulario de edición
     */
    public function edit(Obra $obra)
    {
        // ============================================
        // PASO 1: VERIFICAR AUTORIZACIÓN
        // ============================================
        if ($obra->user_id !== Auth::id()) {
            abort(403, 'No Autorizado');
        }
        return view('obras.edit', compact('obra'));
    }

    // ============================================
    // MÉTODO: UPDATE (Actualizar obra)
    // ============================================

    /**
     * Actualiza la información de una obra en la base de datos.
     * 
     * @param UpdateObraRequest $request Solicitud validada
     * @param Obra $obra Modelo de la obra a actualizar
     * @return \Illuminate\Http\RedirectResponse Redirección a index
     */
    public function update(UpdateObraRequest $request, Obra $obra)
    {
        // ============================================
        // PASO 1: VERIFICAR AUTORIZACIÓN
        // ============================================
        if ($obra->user_id !== Auth::id()) {
            abort(403, 'No Autorizado');
        }

        // ============================================
        // PASO 2: PREPARAR DATOS
        // ============================================
        $data = $request->validated();
        $data['visible'] = $request->boolean('visible');

        // ============================================
        // PASO 3: ACTUALIZAR REGISTRO
        // ============================================
        $obra->update($data);

        return redirect()->route('obras.index')->with('success', 'Obra actualizada exitosamente');
    }

    // ============================================
    // MÉTODO: DESTROY (Eliminar obra)
    // ============================================

    /**
     * Elimina una obra de la base de datos.
     * 
     * @param Obra $obra Modelo de la obra a eliminar
     * @return \Illuminate\Http\RedirectResponse Redirección a index
     */
    public function destroy(Obra $obra)
    {
        // ============================================
        // PASO 1: VERIFICAR AUTORIZACIÓN
        // ============================================
        if ($obra->user_id !== Auth::id()) {
            abort(403, 'No Autorizado');
        }

        // ============================================
        // PASO 2: ELIMINAR REGISTRO
        // ============================================
        $obra->delete();
        return redirect()->route('obras.index')->with('success', '¡Obra eliminada exitosamente!');
    }
}
