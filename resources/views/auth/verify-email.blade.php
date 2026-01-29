<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="https://iesplayamar.es/wp-content/uploads/2021/09/logo-ies-playamar.png" type="image/png">
    <title>Portfolio de Arte | Verificar Email</title>
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

    <div class="glass-card p-5" style="max-width: 500px; width: 100%;">
        <div class="text-center mb-4">
            <span class="material-symbols-outlined text-primary-custom fs-1 mb-2">mark_email_unread</span>
            <h2 class="fw-bold fs-4">Verifica tu Correo</h2>
            <p class="text-secondary small mt-3">
                ¡Gracias por registrarte! Antes de comenzar, ¿podrías verificar tu dirección de correo electrónico
                haciendo clic en el enlace que acabamos de enviarte? Si no recibiste el correo, con gusto te enviaremos
                otro.
            </p>
        </div>

        @if (session('status') == 'verification-link-sent')
            <div class="alert alert-success small mb-4">
                Se ha enviado un nuevo enlace de verificación a la dirección de correo electrónico que proporcionaste
                durante el registro.
            </div>
        @endif

        <div class="d-flex flex-column gap-3">
            <form method="POST" action="{{ route('verification.send') }}">
                @csrf
                <button type="submit" class="btn btn-primary-custom w-100 shadow-sm">
                    Reenviar Email de Verificación
                </button>
            </form>

            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-link text-secondary text-decoration-none w-100 small fw-bold">
                    Cerrar Sesión
                </button>
            </form>
        </div>
    </div>
</body>

</html>
