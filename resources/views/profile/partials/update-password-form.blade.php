<section>
    <header class="mb-4">
        <h2 class="h5 fw-bold text-dark">
            Actualizar Contraseña
        </h2>
        <p class="text-secondary small">
            Asegúrate de que tu cuenta esté usando una contraseña larga y aleatoria para mantenerse segura.
        </p>
    </header>

    <form method="post" action="{{ route('password.update') }}">
        @csrf
        @method('put')

        <div class="mb-3">
            <label for="update_password_current_password" class="form-label fw-bold text-secondary small">CONTRASEÑA
                ACTUAL</label>
            <input type="password" name="current_password" id="update_password_current_password"
                class="form-control form-control-glass" autocomplete="current-password">
            @error('current_password', 'updatePassword')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password" class="form-label fw-bold text-secondary small">NUEVA
                CONTRASEÑA</label>
            <input type="password" name="password" id="update_password_password" class="form-control form-control-glass"
                autocomplete="new-password">
            @error('password', 'updatePassword')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="mb-3">
            <label for="update_password_password_confirmation" class="form-label fw-bold text-secondary small">CONFIRMAR
                CONTRASEÑA</label>
            <input type="password" name="password_confirmation" id="update_password_password_confirmation"
                class="form-control form-control-glass" autocomplete="new-password">
            @error('password_confirmation', 'updatePassword')
                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
            @enderror
        </div>

        <div class="d-flex align-items-center gap-3 mt-4">
            <button type="submit" class="btn btn-primary-custom shadow-sm px-4">
                Guardar Contraseña
            </button>

            @if (session('status') === 'password-updated')
                <span x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 2000)"
                    class="text-success small fw-bold fade-in">
                    <span class="material-symbols-outlined align-middle fs-6">check</span> Guardado.
                </span>
            @endif
        </div>
    </form>
</section>
