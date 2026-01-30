{{--
    ==========================================================================
    VISTA: SHOW (Detalle de Obra)
    ==========================================================================
    Propósito:
    - Visualizar la información detallada de una obra específica.
    - Mostrar la imagen en gran tamaño junto con la descripción y metadatos.
    - Proporcionar accesos directos para Editar o Eliminar la obra actual.
    
    Variables:
    - $obra: Instancia del modelo Obra a visualizar.
    
    Estilos:
    - Diseño de dos columnas (Imagen | Contenido).
--}}
@extends('layouts.bootstrap')

@section('title', 'Mi Portafolio de Arte | Detalle de Obra')
@section('main-style', 'display: flex; align-items: center; justify-content: center;')

@section('content')
    <div class="container" style="max-width: 1000px;">

        {{-- Contenedor principal estilo "Glass" --}}
        <div class="glass-card rounded-4 overflow-hidden shadow-lg p-0">

            <div class="row g-0">
                {{-- 
                    COLUMNA IZQUIERDA: IMAGEN
                    =========================
                    - Ocupa 5 de 12 columnas en pantallas medianas (col-md-5).
                    - Usa 'bg-light' para un fondo suave si la imagen no carga.
                    - 'min-height: 400px' asegura un tamaño mínimo.
                --}}
                <div class="col-md-5 bg-light d-flex align-items-center justify-content-center overflow-hidden"
                    style="min-height: 400px;">

                    {{-- 
                        La imagen principal. 
                        Usa la misma URL externa ($obra->imagen_url).
                        'object-fit-cover' asegura que llene el recuadro perfectamente.
                    --}}
                    <img src="{{ $obra->imagen_url }}" alt="{{ $obra->nombre_obra }}" class="w-100 h-100 object-fit-cover">
                </div>

                {{-- 
                    COLUMNA DERECHA: CONTENIDO
                    ==========================
                    - Ocupa el resto del espacio (col-md-7).
                    - 'd-flex flex-column' permite organizar los elementos verticalmente.
                --}}
                <div class="col-md-7 p-5 d-flex flex-column">

                    {{-- Cabecera: Título y Badge de Estado --}}
                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h1 class="h2 fw-bold text-dark mb-1">{{ $obra->nombre_obra }}</h1>

                            {{-- 
                                Badge Dinámico:
                                Cambia de color (Verde/Rojo) dependiendo de si $obra->visible es true o false.
                                Esto se logra inyectando clases CSS condicionalmente.
                            --}}
                            <span
                                class="badge {{ $obra->visible ? 'bg-success' : 'bg-danger' }} bg-opacity-10 text-{{ $obra->visible ? 'success' : 'danger' }} border border-{{ $obra->visible ? 'success' : 'danger' }} border-opacity-25 rounded-pill px-3">
                                {{ $obra->visible ? 'Visible' : 'Oculto' }}
                            </span>
                        </div>

                        {{-- Botón Cerrar (Volver al índice) --}}
                        <a href="{{ route('obras.index') }}" class="btn btn-sm btn-outline-secondary rounded-circle p-2"
                            title="Volver">
                            <span class="material-symbols-outlined fs-5">close</span>
                        </a>
                    </div>

                    {{-- Descripción de la obra --}}
                    <p class="text-secondary mb-4" style="line-height: 1.8;">
                        {{ $obra->descripcion }}
                    </p>

                    {{-- Grilla de Metadatos (Técnica, Dimensiones, etc.) --}}
                    <div class="row g-3 small text-secondary mb-5">
                        <div class="col-6">
                            <strong class="d-block text-dark mb-1">Técnica</strong>
                            {{ $obra->tecnica }}
                        </div>
                        <div class="col-6">
                            <strong class="d-block text-dark mb-1">Dimensiones</strong>
                            {{ $obra->dimensiones }}
                        </div>
                        <div class="col-6">
                            <strong class="d-block text-dark mb-1">Categoría</strong>
                            {{ $obra->categoria }}
                        </div>
                        <div class="col-6">
                            <strong class="d-block text-dark mb-1">Fecha de Creación</strong>
                            {{ $obra->fecha_creacion->format('d/m/Y') }}
                        </div>
                        <div class="col-12 mt-3">
                            <strong class="d-block text-dark mb-1">Herramientas Usadas</strong>
                            <span class="font-mono bg-white bg-opacity-50 px-2 py-1 rounded border border-light">
                                {{ $obra->herramientas_usadas }}
                            </span>
                        </div>
                    </div>

                    {{-- 
                        Botones de Acción (Editar / Eliminar)
                        'mt-auto' empuja estos botones al final del contenedor.
                    --}}
                    <div class="mt-auto d-flex gap-2">
                        {{-- Enlace a la vista de Edición --}}
                        <a href="{{ route('obras.edit', $obra) }}"
                            class="btn btn-warning text-white fw-bold px-4 rounded-pill shadow-sm d-flex align-items-center gap-2 flex-grow-1 justify-content-center"
                            onmouseover="new Audio('/sounds/bubble-pop-283674.mp3').play()">
                            <span class="material-symbols-outlined fs-5">edit</span>
                            Editar Obra
                        </a>

                        {{-- Formulario para Eliminar (Requiere confirmación JS) --}}
                        <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            {{-- Botón que abre el modal de confirmación --}}
                            <button type="button"
                                class="btn btn-outline-danger fw-bold px-3 rounded-pill d-flex align-items-center gap-2"
                                onmouseover="new Audio('/sounds/bubble-pop-283674.mp3').play()" data-bs-toggle="modal"
                                data-bs-target="#deleteModal-{{ $obra->id }}">
                                <span class="material-symbols-outlined fs-5">delete</span>
                                Eliminar Obra
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
@push('modals')
    {{-- Modal de Confirmación para la obra {{obra->id}} --}}
    <div class="modal fade" id="deleteModal-{{ $obra->id }}" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content glass-card border-0">
                <div class="modal-header border-0">
                    <h5 class="modal-title fw-bold text-dark">¿Eliminar Obra?</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body text-secondary text-center py-4">
                    <span class="material-symbols-outlined fs-1 text-danger">warning</span>
                    <p>Estás a punto de eliminar la obra "{{ $obra->nombre_obra }}".</p>
                    <p class="small mb-0 text-danger">Esta acción no se puede deshacer.</p>
                </div>
                <div class="modal-footer border-0 justify-content-center gap-2">
                    <button type="button" class="btn btn-light rounded-pill px-4"
                        onmouseover="new Audio('/sounds/bubble-pop-283674.mp3').play()"
                        data-bs-dismiss="modal">Cancelar</button>
                    <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold"
                            onmouseover="new Audio('/sounds/bubble-pop-283674.mp3').play()">Sí,
                            eliminar</button>
                    </form>
                </div>
            </div>
        </div>

    </div>
@endpush
