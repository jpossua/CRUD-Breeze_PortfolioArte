<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://iesplayamar.es/wp-content/uploads/2021/09/logo-ies-playamar.png" type="image/png">
    <title>Mi Portafolio de Arte | Registro</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">

    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">

    <style>
        /* --- Custom Theme Variables --- */
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
        }

        /* --- Layout & Backgrounds --- */
        .full-height {
            min-height: 100vh;
        }

        .illustration-bg {
            background: linear-gradient(135deg, var(--mint) 0%, var(--soft-pink) 50%, var(--lavender) 100%);
            position: relative;
            overflow: hidden;
        }

        .code-overlay {
            background-image: radial-gradient(rgba(75, 43, 238, 0.05) 1px, transparent 1px);
            background-size: 20px 20px;
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            opacity: 0.4;
        }

        /* --- Glassmorphism Card (Left side) --- */
        .glass-card {
            background: rgba(255, 255, 255, 0.4);
            backdrop-filter: blur(12px);
            -webkit-backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.4);
            border-radius: 1rem;
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
        }

        /* --- Custom Form Elements --- */
        .input-wrapper {
            position: relative;
        }

        .form-control-custom {
            padding: 0.8rem 1rem;
            padding-right: 2.5rem;
            border: 1px solid #e5e7eb;
            border-radius: 0.5rem;
            background-color: var(--bg-light);
            transition: all 0.3s ease;
        }

        .form-control-custom:focus {
            background-color: #fff;
            border-color: var(--primary-color);
            box-shadow: 0 0 0 4px rgba(75, 43, 238, 0.1);
            outline: none;
        }

        .input-icon {
            position: absolute;
            right: 12px;
            top: 50%;
            transform: translateY(-50%);
            color: #9ca3af;
            pointer-events: none;
        }

        /* --- Buttons --- */
        .btn-primary-custom {
            background-color: var(--primary-color);
            border-color: var(--primary-color);
            color: white;
            padding: 0.8rem;
            font-weight: 700;
            border-radius: 0.5rem;
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            transition: all 0.2s;
        }

        .btn-primary-custom:hover {
            background-color: var(--primary-hover);
            transform: translateY(-1px);
        }

        /* --- Decorations --- */
        .blur-shape {
            position: absolute;
            border-radius: 50%;
            filter: blur(60px);
            opacity: 0.6;
            z-index: 0;
        }

        /* Helpers de texto */
        .text-primary-custom {
            color: var(--primary-color);
        }

        .text-mint {
            color: #009688;
        }

        .text-pink {
            color: #ec4899;
        }

        .text-purple {
            color: #9333ea;
        }

        .font-mono {
            font-family: 'Courier New', Courier, monospace;
        }

        /* Enlaces */
        a {
            text-decoration: none;
            color: var(--primary-color);
        }

        a:hover {
            text-decoration: underline;
            color: var(--primary-hover);
        }
    </style>
</head>

<body>

    <div class="container-fluid p-0 overflow-hidden">
        <div class="row g-0 full-height">

            <!-- Side Illustration (Same as Login) -->
            <div class="col-md-7 d-none d-md-flex align-items-center justify-content-center illustration-bg">
                <div class="code-overlay"></div>

                <div class="blur-shape bg-white"
                    style="width: 300px; height: 300px; bottom: -50px; left: -50px; background-color: var(--mint);">
                </div>
                <div class="blur-shape bg-white"
                    style="width: 350px; height: 350px; top: -50px; right: -50px; background-color: var(--lavender);">
                </div>

                <div class="glass-card p-5 position-relative z-2 w-75" style="max-width: 600px;">
                    <div class="d-flex flex-column gap-3 font-mono small mb-4">
                        <div class="d-flex gap-2">
                            <span class="rounded-circle bg-danger" style="width:12px; height:12px;"></span>
                            <span class="rounded-circle bg-warning" style="width:12px; height:12px;"></span>
                            <span class="rounded-circle bg-success" style="width:12px; height:12px;"></span>
                        </div>
                        <div class="lh-sm">
                            <div class="text-secondary opacity-50 mb-1">// Nuevo miembro del colectivo</div>
                            <div class="text-primary-custom fw-bold"><span class="text-pink">const</span> artist = <span
                                    class="text-purple">new</span> <span class="text-mint">Creator</span>();</div>
                            <div class="text-secondary ps-3"><span class="text-pink">artist</span>.loadTools([</div>
                            <div class="text-secondary ps-5"><span class="text-mint">'imaginación'</span>,</div>
                            <div class="text-secondary ps-5"><span class="text-mint">'código'</span></div>
                            <div class="text-secondary ps-3">]);</div>
                            <div class="text-secondary ps-3"><span class="text-pink">System</span>.init(<span
                                    class="text-purple">artist</span>);</div>
                        </div>
                    </div>

                    <h2 class="display-5 fw-bold text-dark lh-1">
                        Únete al <br />
                        <span class="text-primary-custom fst-italic">Colectivo</span>
                    </h2>
                    <p class="mt-3 text-secondary fs-5">
                        Comienza tu viaje. Crea, programa y comparte tus obras con una comunidad de innovadores.
                    </p>
                </div>
            </div>

            <!-- Login Form -->
            <div
                class="col-12 col-md-5 bg-white d-flex flex-column align-items-center justify-content-center p-4 p-md-5 position-relative">

                <div class="d-md-none position-absolute top-0 start-0 p-4 d-flex align-items-center gap-2">
                    <span class="material-symbols-outlined text-primary-custom">draw</span>
                    <span class="fw-bold fs-5">Arte + Código</span>
                </div>

                <div class="d-none d-md-block position-absolute top-0 end-0 p-4 pe-5">
                    <span class="text-secondary small">¿Ya tienes una cuenta?</span>
                    <a href="{{ route('login') }}" class="small fw-bold ms-1">Iniciar Sesión</a>
                </div>

                <div class="w-100" style="max-width: 400px;">
                    <br class="d-md-none"> <!-- Spacer for mobile header -->
                    <div class="mb-4">
                        <h1 class="fw-bold text-dark display-6">Crear Cuenta</h1>
                        <p class="text-secondary">Completa tus datos para comenzar.</p>
                    </div>

                    <form method="POST" action="{{ route('register') }}">
                        @csrf

                        <!-- Name -->
                        <div class="mb-3">
                            <label for="name" class="form-label small fw-medium text-dark">Nombre Completo</label>
                            <div class="input-wrapper">
                                <input type="text"
                                    class="form-control form-control-custom @error('name') is-invalid @enderror"
                                    id="name" name="name" placeholder="Leonardo da Vinci"
                                    value="{{ old('name') }}" required autofocus autocomplete="name">
                                <span class="material-symbols-outlined input-icon">person</span>
                            </div>
                            @error('name')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Email -->
                        <div class="mb-3">
                            <label for="email" class="form-label small fw-medium text-dark">Correo
                                Electrónico</label>
                            <div class="input-wrapper">
                                <input type="email"
                                    class="form-control form-control-custom @error('email') is-invalid @enderror"
                                    id="email" name="email" placeholder="artista@estudio.com"
                                    value="{{ old('email') }}" required autocomplete="username">
                                <span class="material-symbols-outlined input-icon">mail</span>
                            </div>
                            @error('email')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Password -->
                        <div class="mb-3">
                            <label for="password" class="form-label small fw-medium text-dark">Contraseña</label>
                            <div class="input-wrapper">
                                <input type="password"
                                    class="form-control form-control-custom @error('password') is-invalid @enderror"
                                    id="password" name="password" placeholder="••••••••" required
                                    autocomplete="new-password">
                                <span class="material-symbols-outlined input-icon">lock</span>
                            </div>
                            @error('password')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <!-- Confirm Password -->
                        <div class="mb-4">
                            <label for="password_confirmation" class="form-label small fw-medium text-dark">Confirmar
                                Contraseña</label>
                            <div class="input-wrapper">
                                <input type="password"
                                    class="form-control form-control-custom @error('password_confirmation') is-invalid @enderror"
                                    id="password_confirmation" name="password_confirmation" placeholder="••••••••"
                                    required autocomplete="new-password">
                                <span class="material-symbols-outlined input-icon">lock_reset</span>
                            </div>
                            @error('password_confirmation')
                                <div class="invalid-feedback d-block">{{ $message }}</div>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-primary-custom w-100 mb-4 shadow">
                            Registrarse
                            <span class="material-symbols-outlined fs-5">arrow_forward</span>
                        </button>

                        <div class="mt-4 text-center d-md-none">
                            <p class="small text-secondary">
                                ¿Ya tienes una cuenta?
                                <a class="fw-bold text-primary-custom" href="{{ route('login') }}">Iniciar Sesión</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
