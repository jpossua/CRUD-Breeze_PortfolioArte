<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://iesplayamar.es/wp-content/uploads/2021/09/logo-ies-playamar.png" type="image/png">
    <title>Portfolio de Arte | Confirmar Acceso</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap"
        rel="stylesheet">
    <link href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:wght,FILL@100..700,0..1&display=swap"
        rel="stylesheet">
    <style>
        :root {
            --primary-color: #4b2bee;
            --bg-light: #f6f6f8;
        }

        body {
            font-family: "Space Grotesk", sans-serif;
            background-color: var(--bg-light);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
        }

        .blob-bg {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            z-index: -1;
            pointer-events: none;
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
            background-color: #e0f2f1;
            top: -50px;
            left: -50px;
            animation: float 8s ease-in-out infinite;
        }

        .blob-2 {
            width: 350px;
            height: 350px;
            background-color: #f3e5f5;
            bottom: -50px;
            right: -50px;
            animation: float 10s ease-in-out infinite reverse;
        }

        .glass-card {
            background: rgba(255, 255, 255, 0.6);
            backdrop-filter: blur(12px);
            border: 1px solid rgba(255, 255, 255, 0.5);
            box-shadow: 0 25px 50px -12px rgba(0, 0, 0, 0.1);
            border-radius: 1rem;
        }

        .form-control-glass {
            background: rgba(255, 255, 255, 0.5);
            border: 1px solid rgba(209, 213, 219, 0.5);
            padding: 0.75rem 1rem;
            border-radius: 0.5rem;
        }

        .form-control-glass:focus {
            background: rgba(255, 255, 255, 0.9);
            border-color: var(--primary-color);
            outline: none;
            box-shadow: 0 0 0 3px rgba(75, 43, 238, 0.1);
        }

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
            background-color: #3a21b8;
            transform: translateY(-2px);
            color: white;
        }
    </style>
</head>

<body>
    <div class="blob-bg">
        <div class="blob blob-1"></div>
        <div class="blob blob-2"></div>
    </div>

    <div class="glass-card p-5" style="max-width: 450px; width: 100%;">
        <div class="text-center mb-4">
            <span class="material-symbols-outlined text-primary-custom fs-1 mb-2">lock</span>
            <h2 class="fw-bold fs-4">Área Segura</h2>
            <p class="text-secondary small mt-2">
                Esta es un área segura de la aplicación. Por favor, confirma tu contraseña antes de continuar.
            </p>
        </div>

        <form method="POST" action="{{ route('password.confirm') }}">
            @csrf

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="form-label fw-bold text-secondary small">CONTRASEÑA</label>
                <div class="input-group">
                    <span class="input-group-text bg-white border-0 opacity-75 material-symbols-outlined">key</span>
                    <input type="password" name="password" id="password" required autocomplete="current-password"
                        class="form-control form-control-glass">
                </div>
                @error('password')
                    <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary-custom w-100 mb-2 shadow-sm">
                Confirmar
            </button>
        </form>
    </div>
</body>

</html>
