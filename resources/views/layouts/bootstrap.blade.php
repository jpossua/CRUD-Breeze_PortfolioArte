<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://iesplayamar.es/wp-content/uploads/2021/09/logo-ies-playamar.png" type="image/png">
    <title>{{ $title ?? 'Portfolio de Arte' }}</title>

    <!-- Bootstrap 5 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet" />
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet" />

    <style>
        :root {
            --primary-color: #4b2bee;
            --primary-hover: #3a21b8;
            --bg-light: #f6f6f8;
            --mint: #e0f2f1;
            --lavender: #f3e5f5;
            --soft-pink: #fce4ec;
        }

        body {
            font-family: "Space Grotesk", sans-serif;
            background-color: var(--bg-light);
            overflow-x: hidden;
            min-height: 100vh;
            display: flex;
            flex-direction: column;
        }

        /* --- Utilities --- */
        .text-primary-custom {
            color: var(--primary-color);
        }

        .bg-primary-custom {
            background-color: var(--primary-color);
        }

        .text-mint {
            color: #009688;
        }

        .text-purple {
            color: #9333ea;
        }

        .text-pink {
            color: #ec4899;
        }

        .text-warning {
            color: #d97706;
        }

        .font-mono {
            font-family: 'Courier New', Courier, monospace;
        }

        .text-gradient {
            background: linear-gradient(to right, var(--primary-color), #a855f7);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
        }

        /* --- Background Animation --- */
        .blob-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
            overflow: hidden;
        }

        .code-overlay {
            position: absolute;
            inset: 0;
            background-image: radial-gradient(rgba(75, 43, 238, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            opacity: 0.6;
        }

        .blob {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.5;
        }

        @keyframes float {

            0%,
            100% {
                transform: translate(0, 0);
            }

            50% {
                transform: translate(-20px, 30px);
            }
        }

        .blob-1 {
            width: 400px;
            height: 400px;
            background-color: var(--mint);
            top: -50px;
            left: -50px;
            animation: float 8s ease-in-out infinite;
        }

        .blob-2 {
            width: 350px;
            height: 350px;
            background-color: var(--lavender);
            top: 40%;
            right: -50px;
            animation: float 10s ease-in-out infinite reverse;
        }

        .blob-3 {
            width: 400px;
            height: 400px;
            background-color: var(--soft-pink);
            bottom: -50px;
            left: 20%;
            opacity: 0.4;
        }

        /* --- Glassmorphism --- */
        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        .glass-pill {
            background: rgba(255, 255, 255, 0.6);
            border: 1px solid rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(4px);
        }

        /* --- Forms --- */
        .form-control-glass {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(209, 213, 219, 0.5);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
            transition: all 0.3s;
        }

        .form-control-glass:focus {
            background: rgba(255, 255, 255, 0.9);
            border-color: var(--primary-color);
            box-shadow: 0 0 0 3px rgba(75, 43, 238, 0.1);
            outline: none;
        }

        /* --- Components --- */
        .btn-custom-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 0.8rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 700;
            border: none;
            box-shadow: 0 10px 15px -3px rgba(75, 43, 238, 0.25);
            transition: all 0.2s;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }

        .btn-custom-primary:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            color: white;
        }

        /* High contrast button fix (initially for profile, but useful generally) */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border: none;
            padding: 0.8rem 1.5rem;
            border-radius: 0.75rem;
            font-weight: 700;
            color: white;
            transition: all 0.2s;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-hover);
            transform: translateY(-2px);
            color: white;
        }

        /* --- Nav --- */
        .nav-link-custom {
            font-weight: 600;
            color: #4b5563;
            text-decoration: none;
            transition: color 0.2s;
            padding: 0.5rem 1rem;
        }

        .nav-link-custom:hover,
        .nav-link-custom.active {
            color: var(--primary-color);
        }

        .user-avatar {
            width: 32px;
            height: 32px;
            background: linear-gradient(to top right, var(--primary-color), #a855f7);
            color: white;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-weight: bold;
            font-size: 12px;
        }

        .dropdown-item:active {
            background-color: var(--primary-color);
        }
    </style>

    @stack('styles')
</head>

<body>

    <!-- Background Blobs -->
    <div class="blob-bg">
        <div class="code-overlay"></div>
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
        <div class="blob blob-3"></div>
    </div>

    <!-- Navigation -->
    @include('layouts.bootstrap-navigation')

    <!-- Main Content -->
    <main class="flex-grow-1 p-4 position-relative z-1" style="margin-top: 80px; @yield('main-style')">
        @yield('content')
    </main>

    <footer class="position-relative z-1 py-4 text-center small text-secondary">
        <p class="mb-1">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        <p class="opacity-75">Diseñado por José Manuel Postigo</p>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    @stack('modals')
    @stack('scripts')
</body>

</html>
