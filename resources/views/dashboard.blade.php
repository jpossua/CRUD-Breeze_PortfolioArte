{{--
    ==========================================================================
    VISTA: DASHBOARD (Panel Principal)
    ==========================================================================
    Propósito:
    - Centro de mando para el usuario autenticado.
    - Acceso rápido a las funciones principales:
        1. Ver Portfolio (Index de Obras).
        2. Crear Nueva Obra.
        3. Editar Perfil.
    
    Estilos:
    - Tarjetas de acción interactivas con efectos hover.
    - Mantiene la estética visual del layout 'bootstrap'.
--}}
@extends('layouts.bootstrap')

@section('title', 'Mi Portafolio de Arte | Estudio')

@section('main-style', 'display: flex; align-items: center; justify-content: center;')

@section('content')
    <div class="container glass-card p-5 rounded-4 text-center" style="max-width: 900px;">

        <div
            class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill bg-white bg-opacity-50 border border-white shadow-sm mb-4">
            <span class="d-inline-block rounded-circle bg-success"
                style="width: 8px; height: 8px; animation: pulse 2s infinite;"></span>
            <span class="small font-mono text-secondary">Estudio Activo</span>
        </div>

        <h1 class="display-4 fw-black text-dark mb-3">
            Bienvenido al <span class="text-gradient">Estudio</span>
        </h1>

        <p class="lead text-secondary mb-5 mx-auto" style="max-width: 600px;">
            Hola, <span class="fw-bold text-primary-custom">{{ Auth::user()->name }}</span>. Este es tu lienzo
            digital. Gestiona tus obras, explora nuevas ideas y construye tu portafolio.
        </p>

        <div class="row g-4 justify-content-center">
            <!-- Card 1 -->
            <div class="col-md-4">
                <a href="{{ route('obras.index') }}" class="action-card text-start h-100">
                    <div class="icon-box bg-info bg-opacity-10 text-info">
                        <span class="material-symbols-outlined fs-3">gallery_thumbnail</span>
                    </div>
                    <h4 class="fw-bold text-dark fs-5 mb-2">Mi Portfolio</h4>
                    <p class="small text-secondary mb-0">Administra, edita y publica tus obras de arte.</p>
                </a>
            </div>

            <!-- Card 2 -->
            <div class="col-md-4">
                <a href="{{ route('obras.create') }}" class="action-card text-start h-100">
                    <div class="icon-box bg-warning bg-opacity-10 text-warning">
                        <span class="material-symbols-outlined fs-3">add_photo_alternate</span>
                    </div>
                    <h4 class="fw-bold text-dark fs-5 mb-2">Nueva Obra</h4>
                    <p class="small text-secondary mb-0">Sube una nueva creación a tu colección.</p>
                </a>
            </div>

            <!-- Card 3 -->
            <div class="col-md-4">
                <a href="{{ route('profile.edit') }}" class="action-card text-start h-100">
                    <div class="icon-box bg-danger bg-opacity-10 text-danger">
                        <span class="material-symbols-outlined fs-3">badge</span>
                    </div>
                    <h4 class="fw-bold text-dark fs-5 mb-2">Mi Perfil</h4>
                    <p class="small text-secondary mb-0">Actualiza tu información personal.</p>
                </a>
            </div>
        </div>

        <!-- Code Quote -->
        <div class="mt-5 pt-4 border-top border-secondary border-opacity-10">
            <div class="d-inline-flex gap-2 font-mono small opacity-75">
                <span class="text-pink">while</span>
                <span class="text-secondary">(</span>
                <span class="text-primary-custom">alive</span>
                <span class="text-secondary">)</span>
                <span class="text-secondary">{</span>
                <span class="text-mint">create</span><span class="text-secondary">();</span>
                <span class="text-secondary">}</span>
            </div>
        </div>

    </div>
@endsection

@push('styles')
    <style>
        /* Dashboard specific styles */
        .action-card {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.7);
            border-radius: 1rem;
            padding: 1.5rem;
            transition: all 0.3s;
            text-decoration: none;
            display: block;
        }

        .action-card:hover {
            transform: translateY(-5px);
            background: rgba(255, 255, 255, 0.9);
            box-shadow: 0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04);
        }

        .icon-box {
            width: 48px;
            height: 48px;
            border-radius: 0.75rem;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
            transition: transform 0.3s;
        }

        .action-card:hover .icon-box {
            transform: scale(1.1);
        }
    </style>
@endpush
