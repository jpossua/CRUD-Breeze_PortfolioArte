{{--
    ==========================================================================
    COMPONENTE: NAVGATION (Barra de Navegación)
    ==========================================================================
    Propósito:
    - Menú superior fijo para usuarios autenticados.
    - Navegación entre Dashboard y Portfolio.
    - Menú desplegable de perfil de usuario.
    
    Estilos:
    - Efecto 'Glassmorphism' (cristal) flotante.
    - Adaptable a móvil (Responsive) con menú hamburguesa.
--}}
<nav class="navbar navbar-expand-sm fixed-top glass-pill m-3 rounded-4 shadow-sm"
    style="max-width: 1280px; margin: 1rem auto !important;">
    <div class="container-fluid">
        <!-- Brand -->
        <a href="{{ route('dashboard') }}" class="d-flex align-items-center gap-2 text-decoration-none me-4">
            <span class="material-symbols-outlined text-primary-custom fs-2">draw</span>
            <span class="fw-bold fs-5 text-dark tracking-tight">Portfolio de Arte</span>
        </a>

        <!-- Mobile Toggle -->
        <button class="navbar-toggler border-0" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <!-- Menu -->
        <div class="collapse navbar-collapse" id="navbarContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a href="{{ route('dashboard') }}"
                        class="nav-link-custom {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                        Inicio
                    </a>
                </li>
                <li class="nav-item">
                    <a href="{{ route('obras.index') }}"
                        class="nav-link-custom {{ request()->routeIs('obras.*') ? 'active' : '' }}">
                        Mi Portfolio
                    </a>
                </li>
            </ul>

            <!-- User Dropdown -->
            <ul class="navbar-nav ms-auto">
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle d-flex align-items-center gap-2 text-dark fw-medium"
                        href="#" role="button" data-bs-toggle="dropdown">
                        <div class="user-avatar text-white border border-white">
                            {{ substr(Auth::user()->name, 0, 1) }}
                        </div>
                        <span>{{ Auth::user()->name }}</span>
                    </a>
                    <ul class="dropdown-menu dropdown-menu-end border-0 shadow-lg rounded-3 mt-2">
                        <li>
                            <h6 class="dropdown-header text-secondary font-mono small py-2">// Configuración</h6>
                        </li>
                        <li><a class="dropdown-item py-2 px-3" href="{{ route('profile.edit') }}">Perfil</a></li>
                        <li>
                            <hr class="dropdown-divider">
                        </li>
                        <li>
                            <form method="POST" id="logout-form" action="{{ route('logout') }}">
                                @csrf
                                <button type="button" class="dropdown-item py-2 px-3 text-danger fw-bold" onclick="playLogoutSound()">Cerrar
                                    Sesión</button>
                            </form>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</nav>

<script>
    function playLogoutSound() {
        // 1. Crear el objeto de audio
        let audio = new Audio('/sounds/logout-transBurbujaBobEsponja.mp3'); // Asegúrate que la ruta coincida con tu archivo
        
        // 2. Reproducir sonido
        audio.play().catch(error => {
            // Si falla el audio (bloqueo de navegador), cerramos sesión igual
            console.log("No se pudo reproducir audio:", error);
            document.getElementById('logout-form').submit();
        });

        // 3. Cuando termine el sonido, enviar el formulario
        audio.onended = function() {
            document.getElementById('logout-form').submit();
        };

        // Opción de seguridad: Si el audio es muy largo o falla el onended, forzar salida en 1.5 seg
        setTimeout(() => {
            document.getElementById('logout-form').submit();
        }, 1500); 
    }
</script>
