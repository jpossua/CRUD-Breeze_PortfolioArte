{{--
    ==========================================================================
    VISTA: EDIT (Formulario de Edición)
    ==========================================================================
    Propósito:
    - Mostrar el formulario con los datos cargados de una obra existente.
    - Permitir la modificación de los atributos de la obra.
    
    Variables:
    - $obra: Instancia del modelo Obra a editar (pre-cargada con los datos).
    
    Estilos:
    - Similar a Create, usa 'glass-card' y 'layouts.bootstrap'.
--}}
@extends('layouts.bootstrap')

@section('title', 'Mi Portafolio de Arte | Editar Obra')

@section('content')
    <div class="container" style="max-width: 900px;">

        <div class="glass-card rounded-4 p-5 shadow-lg">
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 fw-bold text-dark mb-0">Editar Obra</h1>
                <a href="{{ route('obras.index') }}"
                    class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-3">
                    <span class="material-symbols-outlined fs-5">arrow_back</span>
                    Volver
                </a>
            </div>

            {{-- 
                FORMULARIO DE EDICIÓN
                =====================
                action: Apunta a la ruta 'update', pasando el objeto $obra para saber cuál actualizar.
                method: HTML solo soporta GET y POST, por lo que usamos POST inicial.
            --}}
            <form action="{{ route('obras.update', $obra) }}" method="POST">
                @csrf

                {{-- 
                    @method('PUT'):
                    Instrucción especial de Laravel para simular una petición PUT o PATCH,
                    que son los estándares REST para actualizar recursos.
                --}}
                @method('PUT')

                <div class="row g-4">
                    <!--
                                    PRE-LLENADO DE DATOS (Model Binding)
                                    ====================================
                                    Usamos old('campo', $valor_por_defecto).
                                    1. old('nombre_obra'): Busca si hubo un intento fallido previo (input del usuario).
                                    2. $obra->nombre_obra: Si no hay input previo, usa el valor guardado en BBDD.
                                -->
                    <div class="col-12">
                        <label for="nombre_obra" class="form-label fw-bold text-secondary small">NOMBRE DE LA OBRA *</label>
                        <input type="text" name="nombre_obra" id="nombre_obra"
                            value="{{ old('nombre_obra', $obra->nombre_obra) }}" required
                            class="form-control form-control-glass w-100 placeholder-opacity-50">
                        @error('nombre_obra')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Descripción -->
                    <div class="col-12">
                        <label for="descripcion" class="form-label fw-bold text-secondary small">DESCRIPCIÓN *</label>
                        <textarea name="descripcion" id="descripcion" rows="4" required class="form-control form-control-glass w-100">{{ old('descripcion', $obra->descripcion) }}</textarea>
                        @error('descripcion')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Técnica y Dimensiones -->
                    <div class="col-md-6">
                        <label for="tecnica" class="form-label fw-bold text-secondary small">TÉCNICA *</label>
                        <input type="text" name="tecnica" id="tecnica" value="{{ old('tecnica', $obra->tecnica) }}"
                            required class="form-control form-control-glass w-100">
                        @error('tecnica')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="dimensiones" class="form-label fw-bold text-secondary small">DIMENSIONES *</label>
                        <input type="text" name="dimensiones" id="dimensiones"
                            value="{{ old('dimensiones', $obra->dimensiones) }}" required
                            class="form-control form-control-glass w-100">
                        @error('dimensiones')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Fecha y Categoría -->
                    <div class="col-md-6">
                        <label for="fecha_creacion" class="form-label fw-bold text-secondary small">FECHA DE CREACIÓN
                            *</label>
                        {{-- Es importante formatear la fecha a Y-m-d para que el input type="date" la reconozca --}}
                        <input type="date" name="fecha_creacion" id="fecha_creacion"
                            value="{{ old('fecha_creacion', $obra->fecha_creacion->format('Y-m-d')) }}" required
                            class="form-control form-control-glass w-100">
                        @error('fecha_creacion')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="categoria" class="form-label fw-bold text-secondary small">CATEGORÍA *</label>
                        <input type="text" name="categoria" id="categoria"
                            value="{{ old('categoria', $obra->categoria) }}" required
                            class="form-control form-control-glass w-100">
                        @error('categoria')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Imagen URL -->
                    <div class="col-12">
                        <label for="imagen_url" class="form-label fw-bold text-secondary small">URL DE LA IMAGEN *</label>
                        <div class="input-group">
                            <span
                                class="input-group-text bg-white border-0 opacity-75 material-symbols-outlined">link</span>
                            <input type="url" name="imagen_url" id="imagen_url"
                                value="{{ old('imagen_url', $obra->imagen_url) }}" required
                                class="form-control form-control-glass">
                        </div>
                        @error('imagen_url')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Herramientas -->
                    <div class="col-12">
                        <label for="herramientas_usadas" class="form-label fw-bold text-secondary small">HERRAMIENTAS USADAS
                            *</label>
                        <input type="text" name="herramientas_usadas" id="herramientas_usadas"
                            value="{{ old('herramientas_usadas', $obra->herramientas_usadas) }}" required
                            class="form-control form-control-glass w-100">
                        @error('herramientas_usadas')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- Visible -->
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input type="hidden" name="visible" value="0">
                            {{-- Para checkboxes, validamos si está marcado con una expresión booleana simple --}}
                            <input class="form-check-input" type="checkbox" name="visible" value="1" id="visible"
                                {{ old('visible', $obra->visible) ? 'checked' : '' }}>
                            <label class="form-check-label text-dark" for="visible">Visible en el portfolio público</label>
                        </div>
                    </div>

                    <!-- Submit (Botón Actualizar) -->
                    <div class="col-12 mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('obras.index') }}"
                            class="btn btn-light text-secondary fw-bold px-4 rounded-pill">Cancelar</a>
                        <button type="submit"
                            class="btn btn-warning text-white fw-bold px-4 rounded-pill shadow-sm d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined fs-5">update</span>
                            Actualizar Obra
                        </button>
                    </div>

                </div>
            </form>

        </div>

    </div>
@endsection
