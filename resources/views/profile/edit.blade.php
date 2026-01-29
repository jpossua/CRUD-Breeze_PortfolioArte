@extends('layouts.bootstrap')

@section('title', 'Portfolio de Arte | Mi Perfil')

@section('content')
    <div class="container" style="max-width: 800px;">
        <div class="mb-5">
            <h1 class="display-6 fw-bold text-dark">Tu Perfil</h1>
            <p class="text-secondary">Administra la información de tu cuenta y seguridad.</p>
        </div>

        <!-- Profile Info -->
        <div class="glass-card p-4 p-md-5 rounded-4 mb-4">
            @include('profile.partials.update-profile-information-form')
        </div>

        <!-- Password -->
        <div class="glass-card p-4 p-md-5 rounded-4 mb-4">
            @include('profile.partials.update-password-form')
        </div>

        <!-- Delete Account -->
        <div class="glass-card p-4 p-md-5 rounded-4 border-danger border-opacity-25"
            style="background: rgba(254, 226, 226, 0.4);">
            @include('profile.partials.delete-user-form')
        </div>

    </div>
@endsection

@push('styles')
    <style>
        /* High contrast button fix for Profile page */
        .btn-primary-custom {
            background-color: #1a1a1a;
            color: #ffffff;
            border: 1px solid #000;
        }

        .btn-primary-custom:hover {
            background-color: #000000;
            color: #ffffff;
            border-color: #000;
            transform: translateY(-2px);
        }
    </style>
@endpush
