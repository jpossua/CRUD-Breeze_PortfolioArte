{{--
    ==========================================================================
    VISTA: INDEX (Listado de Obras)
    ==========================================================================
    Propósito:
    - Mostrar el listado completo de las obras del usuario autenticado.
    - Proporcionar opciones de gestión (Ver, Editar, Eliminar).
    - Incluir botón para crear una nueva obra.
    
    Estilos:
    - Utiliza 'layouts.bootstrap' para la estructura base.
    - Tarjetas con efecto 'glass-card' y hover animado.
--}}
@extends('layouts.bootstrap')

@section('title', 'Mi Portafolio de Arte | Mis Obras')

@section('content')
    <div class="container" style="max-width: 1200px;">

        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="display-5 fw-bold text-dark lh-1">Mis Obras</h1>
                <p class="text-secondary">Gestiona tu colección de arte digital.</p>
            </div>
            <a href="{{ route('obras.create') }}" class="btn-custom-primary">
                <span class="material-symbols-outlined">add</span>
                Nueva Obra
            </a>
        </div>

        <!-- Messages -->
        @if (session('success'))
            <div class="alert alert-success border-0 bg-success-subtle text-success glass-card mb-4 d-flex align-items-center gap-2"
                role="alert">
                <span class="material-symbols-outlined">check_circle</span>
                <div>
                    <span class="fw-bold">¡Éxito!</span> {{ session('success') }}
                </div>
            </div>
        @endif

        <!-- Grid -->
        <div class="row g-4">
            @forelse($obras as $obra)
                <div class="col-md-6 col-lg-4">
                    <div class="glass-card card-obra h-100 p-0 overflow-hidden d-flex flex-column rounded-4">
                        <!-- Image -->
                        <div style="height: 250px; overflow: hidden; position: relative;">
                            <img src="{{ $obra->imagen_url }}" alt="{{ $obra->nombre_obra }}"
                                style="width: 100%; height: 100%; object-fit: cover;">
                            <div class="position-absolute top-0 end-0 p-3">
                                <span
                                    class="badge {{ $obra->visible ? 'bg-success' : 'bg-danger' }} bg-opacity-75 backdrop-blur">
                                    {{ $obra->visible ? 'Visible' : 'Oculto' }}
                                </span>
                            </div>
                        </div>

                        <!-- Content -->
                        <div class="p-4 flex-grow-1 d-flex flex-column">
                            <h3 class="fw-bold text-dark h5 mb-1">{{ $obra->nombre_obra }}</h3>
                            <p class="small text-secondary mb-3">{{ $obra->categoria }} • {{ $obra->tecnica }}</p>

                            <div
                                class="mt-auto pt-3 border-top border-secondary border-opacity-10 d-flex justify-content-between align-items-center">
                                <span class="small font-mono text-secondary opacity-75">
                                    {{ $obra->fecha_creacion->format('d/m/Y') }}
                                </span>

                                <div class="d-flex gap-2">
                                    <a href="{{ route('obras.show', $obra) }}"
                                        class="btn btn-sm btn-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip" title="Ver">
                                        <span class="material-symbols-outlined fs-6 text-primary-custom">visibility</span>
                                    </a>
                                    <a href="{{ route('obras.edit', $obra) }}"
                                        class="btn btn-sm btn-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip" title="Editar">
                                        <span class="material-symbols-outlined fs-6 text-warning">edit</span>
                                    </a>
                                    <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="btn btn-sm btn-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                            onclick="return confirm('¿Estás seguro de que quieres eliminar esta obra?')">
                                            <span class="material-symbols-outlined fs-6 text-danger">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div class="col-12 py-5 text-center">
                    <div class="glass-card p-5 rounded-4 d-inline-block">
                        <span class="material-symbols-outlined text-secondary opacity-25"
                            style="font-size: 64px;">gallery_thumbnail</span>
                        <h3 class="mt-3 text-secondary">Tu galería está vacía</h3>
                        <p class="text-secondary opacity-75 mb-4">Comienza subiendo tu primera obra de arte.</p>
                        <a href="{{ route('obras.create') }}" class="btn-custom-primary">
                            Crear tu primera obra
                        </a>
                    </div>
                </div>
            @endforelse
        </div>

    </div>
@endsection

@push('styles')
    <style>
        .card-obra {
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
        }

        .card-obra:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Initialize Tooltips
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
