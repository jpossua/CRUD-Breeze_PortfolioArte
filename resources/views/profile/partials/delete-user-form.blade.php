<section class="space-y-6">
    <header class="mb-4">
        <h2 class="h5 fw-bold text-danger">
            Eliminar Cuenta
        </h2>
        <p class="text-secondary small">
            Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán permanentemente. Antes de
            eliminar tu cuenta, por favor descarga cualquier dato o información que desees conservar.
        </p>
    </header>

    <button type="button" class="btn btn-danger fw-bold px-4 rounded-pill shadow-sm" data-bs-toggle="modal"
        data-bs-target="#confirmUserDeletionModal">
        Eliminar Cuenta
    </button>

    <!-- Modal Bootstrap -->
    <div class="modal fade" id="confirmUserDeletionModal" tabindex="-1" aria-labelledby="confirmUserDeletionModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content border-0 shadow-lg rounded-4 overflow-hidden">
                <form method="post" action="{{ route('profile.destroy') }}">
                    @csrf
                    @method('delete')

                    <div class="modal-header border-0 bg-danger text-white">
                        <h5 class="modal-title fw-bold" id="confirmUserDeletionModalLabel">
                            ¿Estás seguro de que quieres eliminar tu cuenta?
                        </h5>
                        <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>

                    <div class="modal-body p-4 bg-light">
                        <p class="text-secondary mb-4">
                            Una vez que se elimine tu cuenta, todos sus recursos y datos se eliminarán permanentemente.
                            Por favor, introduce tu contraseña para confirmar que deseas eliminar tu cuenta de forma
                            permanente.
                        </p>

                        <div class="mb-3">
                            <label for="password" class="form-label visually-hidden">Contraseña</label>
                            <input type="password" name="password" id="password"
                                class="form-control form-control-glass border-danger" placeholder="Contraseña" required>
                            @error('password', 'userDeletion')
                                <span class="text-danger small mt-1 d-block">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="modal-footer border-0 bg-light p-4 pt-0">
                        <button type="button" class="btn btn-secondary fw-bold rounded-pill"
                            data-bs-dismiss="modal">Cancelar</button>
                        <button type="submit" class="btn btn-danger fw-bold rounded-pill">Eliminar Cuenta</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</section>
