<section>
    <header class="mb-4">
        <h2 class="h5 fw-bold text-dark">
            Información del Perfil
        </h2>
        <p class="text-secondary small">
            Actualiza la información de tu cuenta y tu dirección de correo electrónico.
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}">
        @csrf
        @method('patch')

        <div class="mb-3">
            <label for="name" class="form-label fw-bold text-secondary small">NOMBRE</label>
            <input type="text" name="name" id="name" class="form-control form-control-glass"
                value="{{ old('name', $user->name) }}" required autofocus autocomplete="name">
            @error('name')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="email" class="form-label fw-bold text-secondary small">CORREO ELECTRÓNICO</label>
            <input type="email" name="email" id="email" class="form-control form-control-glass"
                value="{{ old('email', $user->email) }}" required autocomplete="username">
            @error('email')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && !$user->hasVerifiedEmail())
                <div class="mt-2">
                    <p class="text-sm text-dark">
                        Tu dirección de correo no está verificada.
                        <button form="send-verification"
                            class="btn btn-link p-0 align-baseline small fw-bold text-primary-custom text-decoration-none">
                            Haz clic aquí para reenviar el correo de verificación.
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="text-success small fw-bold">
                            Se ha enviado un nuevo enlace de verificación a tu correo.
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary-custom shadow-sm px-4">
                Guardar Cambios
            </button>

            @if (session('status') === 'profile-updated')
                <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small fw-bold fade-in">
                    <span class="material-symbols-outlined align-middle fs-6">check</span> Guardado.
                </span>
            @endif
        </div>
    </form>
</section>
