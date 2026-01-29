{{--
    ==========================================================================
    VISTA: WELCOME (Landing Page)
    ==========================================================================
    Propósito:
    - Página de aterrizaje pública del portafolio.
    - Presentación visual atractiva con animaciones CSS (blobs).
    - Muestra fragmentos de código decorativos.
    - Puntos de entrada para Login/Registro o acceso al Dashboard.
    
    Estilos:
    - CSS personalizado en <style> para animaciones y glassmorphism.
    - Uso de Google Fonts (Space Grotesk).
--}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://iesplayamar.es/wp-content/uploads/2021/09/logo-ies-playamar.png" type="image/png">
    <title>Mi Portafolio de Arte | Bienvenida</title>

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

        /* --- Custom Utilities to match Tailwind Look --- */
        .text-primary-custom {
            color: var(--primary-color);
        }

        .bg-primary-custom {
            background-color: var(--primary-color);
        }

        .text-mint {
            color: #009688;
        }

        /* Matching Tailwind teal-500 approx */
        .text-purple {
            color: #9333ea;
        }

        /* Matching Tailwind purple-600 */
        .text-pink {
            color: #ec4899;
        }

        /* Matching Tailwind pink-500 */

        .font-mono {
            font-family: 'Courier New', Courier, monospace;
        }

        /* Gradients */
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
            background: rgba(255, 255, 255, 0.4);
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

        /* --- Buttons --- */
        .btn-custom-primary {
            background-color: var(--primary-color);
            color: white;
            padding: 1rem 2rem;
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

        .btn-custom-outline {
            background-color: rgba(255, 255, 255, 0.5);
            color: #1f2937;
            padding: 1rem 2rem;
            border-radius: 0.75rem;
            font-weight: 700;
            border: 1px solid #e5e7eb;
            transition: all 0.2s;
            text-decoration: none;
        }

        .btn-custom-outline:hover {
            background-color: #fff;
            color: #000;
        }

        /* --- Nav --- */
        .nav-link-custom {
            font-weight: 600;
            color: #4b5563;
            text-decoration: none;
            transition: color 0.2s;
        }

        .nav-link-custom:hover {
            color: var(--primary-color);
        }
    </style>
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
    <nav class="navbar fixed-top p-4" style="max-width: 1280px; margin: 0 auto;">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="d-flex align-items-center gap-2">
                <span class="material-symbols-outlined text-primary-custom fs-2">draw</span>
                <span class="fw-bold fs-4 text-dark tracking-tight">Portfolio de Arte</span>
            </div>

            <!-- Login/Register Links (Removed as requested, but keeping container structure if needed later) -->
            <!--
            <div class="d-flex align-items-center gap-3">
                @if (Route::has('login'))
                    @auth
                                                    <a href="{{ url('/dashboard') }}" class="nav-link-custom">Panel</a>
@else
    <a href="{{ route('login') }}" class="nav-link-custom">Iniciar Sesión</a>
                                                    @if (Route::has('register'))
    <a href="{{ route('register') }}" class="d-none d-sm-inline-block btn btn-sm bg-primary-custom text-white fw-bold rounded px-3 py-2 shadow-sm text-decoration-none">Registrarse</a>
    @endif
                    @endauth
                @endif
            </div>
            -->
        </div>
    </nav>

    <!-- Main Content -->
    <main class="flex-grow-1 d-flex align-items-center justify-content-center p-4 position-relative z-1"
        style="margin-top: 80px;">
        <div class="container" style="max-width: 1024px;">
            <div class="row align-items-center gy-5">

                <!-- Left Column: Text -->
                <div class="col-md-6 text-center text-md-start">
                    <div
                        class="d-inline-flex align-items-center gap-2 px-3 py-1 rounded-pill glass-pill shadow-sm mb-4">
                        <span class="d-inline-block rounded-circle bg-success"
                            style="width: 8px; height: 8px; animation: pulse 2s infinite;"></span>
                        <span class="small font-mono text-secondary">v1.0.0 Lanzamiento</span>
                    </div>

                    <h1 class="display-3 fw-black text-dark lh-1 mb-4">
                        Crea tu <br />
                        <span class="text-gradient">Obra Maestra</span>
                    </h1>

                    <p class="lead text-secondary mb-5 mx-auto mx-md-0" style="max-width: 450px;">
                        Donde la lógica encuentra la estética. Una plataforma de portafolio curada para desarrolladores
                        creativos y artistas digitales.
                    </p>

                    <div class="d-flex flex-column flex-sm-row gap-3 justify-content-center justify-content-md-start">
                        @auth
                            <a href="{{ url('/dashboard') }}" class="btn-custom-primary group">
                                <span>Ir al Estudio</span>
                                <span class="material-symbols-outlined">arrow_forward</span>
                            </a>
                        @else
                            <a href="{{ route('register') }}" class="btn-custom-primary group">
                                <span>Registrarse</span>
                                <span class="material-symbols-outlined">person_add</span>
                            </a>
                            <a href="{{ route('login') }}" class="btn-custom-outline">
                                Iniciar Sesión
                            </a>
                        @endauth
                    </div>
                </div>

                <!-- Right Column: Code Card -->
                <div class="col-md-6 d-none d-md-block">
                    <div class="position-relative">
                        <!-- Blur behind card for extra pop -->
                        <div class="position-absolute w-100 h-100 rounded-4 bg-gradient-to-r from-mint via-lavender to-soft-pink opacity-50 blur"
                            style="filter: blur(40px); transform: scale(0.9);"></div>

                        <div class="glass-card p-4 rounded-4 position-relative">
                            <!-- Mac Window Controls -->
                            <div class="d-flex gap-2 mb-4 border-bottom border-light pb-3">
                                <span class="rounded-circle bg-danger" style="width:12px; height:12px;"></span>
                                <span class="rounded-circle bg-warning" style="width:12px; height:12px;"></span>
                                <span class="rounded-circle bg-success" style="width:12px; height:12px;"></span>
                                <span
                                    class="ms-auto small font-mono text-secondary opacity-50">ArtworkController.php</span>
                            </div>

                            <!-- Code -->
                            <div class="font-mono small mb-4" style="line-height: 1.6;">
                                <div class="d-flex">
                                    <span class="text-secondary opacity-50 me-3 user-select-none">1</span>
                                    <span><span class="text-pink">class</span> <span
                                            class="text-warning">Portfolio</span> <span
                                            class="text-secondary">{</span></span>
                                </div>
                                <div class="d-flex">
                                    <span class="text-secondary opacity-50 me-3 user-select-none">2</span>
                                    <span class="ms-3"><span class="text-primary-custom">public function</span> <span
                                            class="text-primary">inspire</span>()</span>
                                </div>
                                <div class="d-flex">
                                    <span class="text-secondary opacity-50 me-3 user-select-none">3</span>
                                    <span class="ms-3 text-secondary">{</span>
                                </div>
                                <div class="d-flex">
                                    <span class="text-secondary opacity-50 me-3 user-select-none">4</span>
                                    <span class="ms-5"><span class="text-pink">return</span> <span
                                            class="text-success">view</span>(<span
                                            class="text-warning">'art.gallery'</span>);</span>
                                </div>
                                <div class="d-flex">
                                    <span class="text-secondary opacity-50 me-3 user-select-none">5</span>
                                    <span class="ms-3 text-secondary">}</span>
                                </div>
                                <div class="d-flex">
                                    <span class="text-secondary opacity-50 me-3 user-select-none">6</span>
                                    <span class="text-secondary">}</span>
                                </div>
                            </div>

                            <!-- Footer of Card -->
                            <div class="border-top border-light pt-3 d-flex justify-content-between align-items-center">
                                <div class="small text-secondary d-flex align-items-center gap-1">
                                    <span class="material-symbols-outlined fs-6 text-success">check_circle</span>
                                    Compilado exitosamente
                                </div>
                                <span class="badge bg-primary-custom bg-opacity-10 text-secondary-custom font-mono">PHP
                                    8.2</span>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </main>

    <footer class="position-relative z-1 py-4 text-center small text-secondary">
        <p class="mb-1">Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        <p class="opacity-75">Diseñado por José Manuel Postigo</p>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
