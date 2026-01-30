{{--
    ==========================================================================
    VISTA: CREATE (Formulario de Creación)
    ==========================================================================
    Propósito:
    - Mostrar el formulario para registrar una nueva obra en el sistema.
    - Capturar todos los datos requeridos (Nombre, Descripción, etc.).
    - Validar errores de entrada visualmente y enviar a 'obras.store' (POST).
    
    Estilos:
    - Utiliza 'layouts.bootstrap'.
    - Formulario contenido en 'glass-card' centrado.
--}}
@extends('layouts.bootstrap')

@section('title', 'Mi Portafolio de Arte | Nueva Obra')
@section('main-style', 'display: flex; align-items: center; justify-content: center;')

@section('content')
    <div class="container" style="max-width: 900px;">

        <div class="glass-card rounded-4 p-5 shadow-lg">
            {{-- Encabezado con título y botón para cancelar/volver --}}
            <div class="d-flex justify-content-between align-items-center mb-4">
                <h1 class="h3 fw-bold text-dark mb-0">Nueva Obra</h1>
                <a href="{{ route('obras.index') }}"
                    class="btn btn-outline-secondary rounded-pill d-flex align-items-center gap-2 px-3">
                    <span class="material-symbols-outlined fs-5">arrow_back</span>
                    Volver
                </a>
            </div>

            {{-- 
                INICIO DEL FORMULARIO
                =====================
                action: A dónde se envían los datos (ruta 'obras.store').
                method: Método HTTP (POST para crear).
            --}}
            <form action="{{ route('obras.store') }}" method="POST">

                {{-- 
                    @csrf: Directiva de Seguridad Obligatoria.
                    Genera un token oculto para proteger contra ataques CSRF (Cross-Site Request Forgery).
                    Sin esto, Laravel rechazará el formulario por seguridad.
                --}}
                @csrf

                <div class="row g-4">
                    <!--
                                                    CAMPO: NOMBRE DE LA OBRA
                                                    Usa value="{{ old('nombre_obra') }}" para que si hay un error al guardar,
                                                     no se borre lo que el usuario ya escribió.
                                                -->
                    <div class="col-12">
                        <label for="nombre_obra" class="form-label fw-bold text-secondary small">NOMBRE DE LA OBRA *</label>
                        <input type="text" name="nombre_obra" id="nombre_obra" value="{{ old('nombre_obra') }}" required
                            class="form-control form-control-glass w-100" placeholder="Título de tu creación">

                        {{-- Muestra el error de validación si existe para este campo específico --}}
                        @error('nombre_obra')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- CAMPO: DESCRIPCIÓN (Textarea para textos largos) -->
                    <div class="col-12">
                        <label for="descripcion" class="form-label fw-bold text-secondary small">DESCRIPCIÓN *</label>
                        <textarea name="descripcion" id="descripcion" rows="4" required class="form-control form-control-glass w-100"
                            placeholder="Cuenta la historia detrás de esta obra...">{{ old('descripcion') }}</textarea>
                        @error('descripcion')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- GRUPO: TÉCNICA Y DIMENSIONES (Dos columnas col-md-6) -->
                    <div class="col-md-6">
                        <label for="tecnica" class="form-label fw-bold text-secondary small">TÉCNICA *</label>
                        <input type="text" name="tecnica" id="tecnica" value="{{ old('tecnica') }}" required
                            class="form-control form-control-glass w-100" placeholder="Ej: Óleo, Digital, Acuarela">
                        @error('tecnica')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="dimensiones" class="form-label fw-bold text-secondary small">DIMENSIONES *</label>
                        <input type="text" name="dimensiones" id="dimensiones" value="{{ old('dimensiones') }}" required
                            class="form-control form-control-glass w-100" placeholder="Ej: 1920x1080px, 50x70cm">
                        @error('dimensiones')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- GRUPO: FECHA Y CATEGORÍA -->
                    <div class="col-md-6">
                        {{-- Input type="date" muestra un selector de calendario nativo --}}
                        <label for="fecha_creacion" class="form-label fw-bold text-secondary small">FECHA DE CREACIÓN
                            *</label>
                        <input type="date" name="fecha_creacion" id="fecha_creacion" value="{{ old('fecha_creacion') }}"
                            required class="form-control form-control-glass w-100">
                        @error('fecha_creacion')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="col-md-6">
                        <label for="categoria" class="form-label fw-bold text-secondary small">CATEGORÍA *</label>
                        <input type="text" name="categoria" id="categoria" value="{{ old('categoria') }}" required
                            class="form-control form-control-glass w-100" placeholder="Ej: Retrato, Paisaje, Abstracto">
                        @error('categoria')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--
                                                    CAMPO: URL DE LA IMAGEN
                                                    Aquí es donde el usuario pega el enlace externo.
                                                    No hay subida de archivos, solo texto type="url".
                                                -->
                    <div class="col-12">
                        <label for="imagen_url" class="form-label fw-bold text-secondary small">URL DE LA IMAGEN *</label>
                        <div class="input-group">
                            <span
                                class="input-group-text bg-white border-0 opacity-75 material-symbols-outlined">link</span>
                            <input type="url" name="imagen_url" id="imagen_url" value="{{ old('imagen_url') }}"
                                required class="form-control form-control-glass" placeholder="https://...">
                        </div>
                        @error('imagen_url')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!-- CAMPO: HERRAMIENTAS -->
                    <div class="col-12">
                        <label for="herramientas_usadas" class="form-label fw-bold text-secondary small">HERRAMIENTAS USADAS
                            *</label>
                        <input type="text" name="herramientas_usadas" id="herramientas_usadas"
                            value="{{ old('herramientas_usadas') }}" required class="form-control form-control-glass w-100"
                            placeholder="Ej: Photoshop, Pinceles, Tableta Wacom">
                        @error('herramientas_usadas')
                            <span class="text-danger small">{{ $message }}</span>
                        @enderror
                    </div>

                    <!--
                                                    CHECKBOX: VISIBILIDAD
                                                    Truco HTML: Los checkbox no marcados no se envían.
                                                    Ponemos un hidden con valor "0" antes para enviar siempre un valor (0 o 1).
                                                -->
                    <div class="col-12">
                        <div class="form-check form-switch">
                            <input type="hidden" name="visible" value="0">
                            <input class="form-check-input" type="checkbox" name="visible" value="1" id="visible"
                                {{ old('visible', 1) ? 'checked' : '' }}>
                            <label class="form-check-label text-dark" for="visible">Visible en el portfolio
                                público</label>
                        </div>
                    </div>

                    <!-- BOTONES DE ACCIÓN -->
                    <div class="col-12 mt-4 d-flex justify-content-end gap-2">
                        <a href="{{ route('obras.index') }}"
                            class="btn btn-light text-secondary fw-bold px-4 rounded-pill"
                            onmouseover="new Audio('/sounds/bubble-pop-283674.mp3').play()">Cancelar</a>
                        <button type="submit" onmouseover="new Audio('/sounds/bubble-pop-283674.mp3').play()"
                            class="btn btn-primary bg-primary-custom border-0 fw-bold px-4 rounded-pill shadow-sm d-flex align-items-center gap-2">
                            <span class="material-symbols-outlined fs-5">save</span>
                            Guardar Obra
                        </button>
                    </div>

                </div>
            </form>

        </div>

    </div>
@endsection
