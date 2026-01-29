{{--
    ==========================================================================
    VISTA: INDEX (Listado de Obras)
    ==========================================================================
    Propósito:
    - Mostrar el listado completo de las obras del usuario autenticado.
    - Proporcionar opciones de gestión (Ver, Editar, Eliminar).
    - Incluir botón para crear una nueva obra.
    - Funciona iterando (recorriendo) la lista de obras que envió el Controlador.
    
    Estilos:
    - Utiliza 'layouts.bootstrap' para la estructura base.
    - Tarjetas con efecto 'glass-card' y hover animado.
--}}

{{--
    @extends('layouts.bootstrap'):
    Hereda la estructura base (HTML, metadatos, CSS, JS) del archivo
    resources/views/layouts/bootstrap.blade.php.
    Evita repetir código común en todas las páginas.
--}}
@extends('layouts.bootstrap')

{{-- Define el título específico para esta página que se insertará en el <title> del layout --}}
@section('title', 'Mi Portafolio de Arte | Mis Obras')

{{--
    @section('content'):
    Aquí empieza el contenido único de esta página. Todo lo que esté dentro
    de esta sección se inyectará donde el layout tenga @yield('content').
--}}
@section('content')
    <div class="container" style="max-width: 1200px;">

        {{-- Cabecera de la sección (Título y Botón de Crear) --}}
        <div class="d-flex justify-content-between align-items-center mb-5">
            <div>
                <h1 class="display-5 fw-bold text-dark lh-1">Mis Obras</h1>
                <p class="text-secondary">Gestiona tu colección de arte digital.</p>
            </div>

            {{--
                route('obras.create'):
                Genera automáticamente la URL para crear una obra (ej: /obras/create).
                Es mejor usar nombres de ruta que URLs fijas.
            --}}
            <a href="{{ route('obras.create') }}" class="btn-custom-primary">
                <span class="material-symbols-outlined">add</span>
                Nueva Obra
            </a>
        </div>

        {{--
            Mensajes de Sesión (Feedback):
            Verifica si el controlador envió un mensaje 'success' (por ejemplo, después de guardar).
            Si existe, muestra una alerta verde bonita.
        --}}
        @if (session('success'))
            <div class="alert alert-success border-0 bg-success-subtle text-success glass-card mb-4 d-flex align-items-center gap-2"
                role="alert">
                <span class="material-symbols-outlined">check_circle</span>
                <div>
                    <span class="fw-bold">¡Éxito!</span> {{ session('success') }}
                </div>
            </div>
        @endif

        {{--
            Grid de Tarjetas:
            'row' y 'col-*' son clases de Bootstrap para crear rejillas responsivas.
        --}}
        <div class="row g-4">
            {{--
                Bucle @forelse:
                Es una combinación de "foreach" (para recorrer) y "if/else" (si está vacío).
                Recorre la variable $obras que viene del controlador.
            --}}
            @forelse($obras as $obra)
                <div class="col-md-6 col-lg-4">
                    {{-- Tarjeta de la Obra --}}
                    <div class="glass-card card-obra h-100 p-0 overflow-hidden d-flex flex-column rounded-4">

                        {{--
                            VISUALIZACIÓN DE LA IMAGEN
                            ==========================
                            Aquí ocurre la magia visual explicada anteriormente:
                            1. Un contenedor con altura fija (250px).
                            2. La imagen usa 'object-fit: cover' para llenar el espacio sin deformarse.
                            3. La URL viene de la base de datos: {{ $obra->imagen_url }}
                        --}}
                        <div style="height: 250px; overflow: hidden; position: relative;">
                            <img src="{{ $obra->imagen_url }}" alt="{{ $obra->nombre_obra }}"
                                style="width: 100%; height: 100%; object-fit: cover;">

                            {{-- Badge de Visibilidad (Visible/Oculto) --}}
                            <div class="position-absolute top-0 end-0 p-3">
                                <span
                                    class="badge {{ $obra->visible ? 'bg-success' : 'bg-danger' }} bg-opacity-75 backdrop-blur">
                                    {{-- Operador ternario: (condición ? verdadero : falso) --}}
                                    {{ $obra->visible ? 'Visible' : 'Oculto' }}
                                </span>
                            </div>
                        </div>

                        <!-- Contenido de la Tarjeta -->
                        <div class="p-4 flex-grow-1 d-flex flex-column">
                            <h3 class="fw-bold text-dark h5 mb-1">{{ $obra->nombre_obra }}</h3>
                            <p class="small text-secondary mb-3">{{ $obra->categoria }} • {{ $obra->tecnica }}</p>

                            {{-- Footer de la tarjeta con acciones --}}
                            <div
                                class="mt-auto pt-3 border-top border-secondary border-opacity-10 d-flex justify-content-between align-items-center">
                                <span class="small font-mono text-secondary opacity-75">
                                    {{-- Formateo de fecha con Carbon (librería de fechas de Laravel) --}}
                                    {{ $obra->fecha_creacion->format('d/m/Y') }}
                                </span>

                                <div class="d-flex gap-2">
                                    {{-- Botón Ver --}}
                                    <a href="{{ route('obras.show', $obra) }}"
                                        class="btn btn-sm btn-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip" title="Ver">
                                        <span class="material-symbols-outlined fs-6 text-primary-custom">visibility</span>
                                    </a>

                                    {{-- Botón Editar --}}
                                    <a href="{{ route('obras.edit', $obra) }}"
                                        class="btn btn-sm btn-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                        data-bs-toggle="tooltip" title="Editar">
                                        <span class="material-symbols-outlined fs-6 text-warning">edit</span>
                                    </a>

                                    {{-- 
                                        Botón Eliminar (Formulario)
                                        Requiere un formulario POST con método DELETE simulado para seguridad.
                                    --}}
                                    <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                                        @csrf {{-- Token de seguridad obligatorio --}}
                                        @method('DELETE') {{-- Simula una petición DELETE HTTP --}}
                                        <button type="button"
                                            class="btn btn-sm btn-light rounded-circle p-2 d-flex align-items-center justify-content-center"
                                            data-bs-toggle="modal" data-bs-target="#deleteModal-{{ $obra->id }}"
                                            title="Eliminar">
                                            <span class="material-symbols-outlined fs-6 text-danger">delete</span>
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                {{-- Bloque @empty: Se ejecuta si no hay ninguna obra en la lista --}}
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
    @push('modals')
        <!-- Bucle EXCLUSIVO para los modales -->
        @foreach ($obras as $obra)
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
                                data-bs-dismiss="modal">Cancelar</button>
                            <form action="{{ route('obras.destroy', $obra) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger rounded-pill px-4 fw-bold">Sí,
                                    eliminar</button>
                            </form>
                        </div>
                    </div>
                </div>

            </div>
        @endforeach
    @endpush
@endsection

@push('styles')
    <style>
        /* Estilos CSS específicos para esta vista */
        .card-obra {
            transition: all 0.3s ease;
            cursor: pointer;
            height: 100%;
        }

        /* Efecto Hover: Eleva la tarjeta y aumenta la sombra */
        .card-obra:hover {
            transform: translateY(-5px);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }
    </style>
@endpush

@push('scripts')
    <script>
        // Inicialización de Tooltips de Bootstrap (las burbujitas de ayuda al pasar el mouse por los botones)
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function(tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    </script>
@endpush
