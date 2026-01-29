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

        <div class="glass-card rounded-4 overflow-hidden shadow-lg p-0">

            <div class="row g-0">
                <!-- Image Column -->
                <div class="col-md-5 bg-light d-flex align-items-center justify-content-center overflow-hidden"
                    style="min-height: 400px;">
                    <img src="{{ $obra->imagen_url }}" alt="{{ $obra->nombre_obra }}" class="w-100 h-100 object-fit-cover">
                </div>

                <!-- Content Column -->
                <div class="col-md-7 p-5 d-flex flex-column">

                    <div class="d-flex justify-content-between align-items-start mb-3">
                        <div>
                            <h1 class="h2 fw-bold text-dark mb-1">{{ $obra->nombre_obra }}</h1>
                            <span
                                class="badge {{ $obra->visible ? 'bg-success' : 'bg-danger' }} bg-opacity-10 text-{{ $obra->visible ? 'success' : 'danger' }} border border-{{ $obra->visible ? 'success' : 'danger' }} border-opacity-25 rounded-pill px-3">
                                {{ $obra->visible ? 'Visible' : 'Oculto' }}
                            </span>
                        </div>
                        <a href="{{ route('obras.index') }}" class="btn btn-sm btn-outline-secondary rounded-circle p-2"
                            title="Volver">
                            <span class="material-symbols-outlined fs-5">close</span>
                        </a>
                    </div>

                    <p class="text-secondary mb-4" style="line-height: 1.8;">
                        {{ $obra->descripcion }}
                    </p>

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

                    <div class="mt-auto d-flex gap-2">
                        <a href="{{ route('obras.edit', $obra) }}"
                            class="btn btn-warning text-white fw-bold px-4 rounded-pill shadow-sm d-flex align-items-center gap-2 flex-grow-1 justify-content-center">
                            <span class="material-symbols-outlined fs-5">edit</span>
                            Editar Obra
                        </a>
                        <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="submit"
                                class="btn btn-outline-danger fw-bold px-3 rounded-pill d-flex align-items-center gap-2"
                                onclick="return confirm('¿Estás seguro de que quieres eliminar esta obra?')">
                                <span class="material-symbols-outlined fs-5">delete</span>
                            </button>
                        </form>
                    </div>

                </div>
            </div>

        </div>

    </div>
@endsection
