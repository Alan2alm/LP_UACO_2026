<div class="container-fluid vh-100 d-flex justify-content-center align-items-center m-0">
    <div class="col-12 col-sm-9 col-md-7 col-lg-4 col-xl-3 bg-body bg-gradient text-center px-3 px-sm-4 py-5 border rounded shadow-sm">
        <div class="loginBox w-100">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-success h3 text-wrap">Bienvenido</h2>
                <p class="text-muted small text-wrap">Ingrese los siguientes datos para continuar</p>
            </div>

            <form id="sessionForm" action="authentication/login" method="POST" class="w-100">
                <div class="text-start mb-3 border-top pt-3">
                    <label for="user" class="form-label fw-semibold small">Nombre de Usuario</label>
                    <input type="text" id="user" name="user" minlength="4" class="form-control w-100" placeholder="Usuario" required>
                </div>
                
                <div class="text-start mb-4">
                    <label for="pass" class="form-label fw-semibold small">Contraseña</label>
                    <input type="password" id="pass" name="pass" minlength="4" class="form-control w-100" placeholder="*******" required>
                </div>

                <div class="d-grid border-top pt-3">
                    <button type="submit" class="btn btn-primary btn-lg w-100" id="ingresarBtn">Ingresar</button>
                </div>
            </form>

            <div class="mt-4 text-center border-top pt-3">
                <a class="text-decoration-none small d-block" id="resetPass"  data-bs-toggle="modal" data-bs-target="#emailModal">¿Olvidó su contraseña?</a>
            </div>

            <div class="mt-4 text-center border-top pt-3 text-danger">
                <h3><?php if(!empty($error))echo $error;?></h3>
            </div>
        </div>
    </div>
</div>

<!-- Modal Oficial de Bootstrap -->
    <div class="modal fade" id="emailModal" tabindex="-1" aria-labelledby="emailModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content modal-custom-content p-3">
                
                <!-- Encabezado personalizado del Modal (sin botón de cerrar nativo para mantener diseño minimalista) -->
                <div class="modal-header modal-custom-header flex-column align-items-start pb-0">
                    <h2 class="modal-title fs-3 fw-bold text-black" id="emailModalLabel">Resetear contraseña</h2>
                    <p class="text-secondary small mb-0">Por favor, ingresa tu correo electrónico para continuar.</p>
                </div>

                <!-- Formulario -->
                <form id="emailForm" novalidate>
                    <div class="modal-body py-4">
                        <div class="mb-3">
                            <label for="correo" class="form-label text-secondary text-uppercase fw-semibold tracking-wider mb-2" style="font-size: 0.75rem;">
                                Correo Electrónico
                            </label>
                            
                            <!-- Caja contenedora con input y su icono de feedback -->
                            <div class="input-icon-wrapper">
                                <input type="email" id="correo" name="correo" required class="form-control input-dark" placeholder="ejemplo@correo.com">
                                <span id="validationIcon" class="input-validation-icon"></span>
                            </div>
                            
                            <!-- Mensaje de error personalizado estilo Bootstrap -->
                            <div id="errorFeedback" class="text-danger small mt-2 d-none">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> Por favor introduce una dirección válida.
                            </div>
                        </div>
                    </div>

                    <!-- Botonera -->
                    <div class="modal-footer modal-custom-footer pt-0 d-flex gap-3 justify-content-end">
                        <!-- Botón Cancelar -->
                        <button type="button" class="btn btn-outline-secondary px-4 py-2.5 rounded-3 border-secondary text-light-hover" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <!-- Botón Enviar -->
                        <button type="button" class="btn btn-primary px-4 py-2.5 rounded-3 fw-semibold bg-indigo-600 border-0" id="resetBtn">
                            Enviar
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Modal Cambiar Contraseña -->
    <div class="modal fade" id="changePasswordModal" tabindex="-1" aria-labelledby="changePasswordModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-3">
                
                <div class="modal-header flex-column align-items-start pb-0 border-0">
                    <h2 class="modal-title fs-3 fw-bold text-black" id="changePasswordModalLabel">Actualizar Contraseña</h2>
                    <p class="text-secondary small mb-0">Ingresa tu nueva contraseña y confírmala para asegurar tu cuenta.</p>
                </div>

                <form id="changePassForm" novalidate>
                    <div class="modal-body py-4">
                        <!-- Input Nueva Contraseña -->
                        <div class="mb-3 text-start">
                            <label for="newPass" class="form-label text-secondary text-uppercase fw-semibold" style="font-size: 0.75rem;">
                                Nueva Contraseña
                            </label>
                            <input type="password" id="newPass" name="newPass" minlength="4" required class="form-control" placeholder="••••••••">
                        </div>
                        
                        <!-- Input Confirmar Contraseña -->
                        <div class="mb-3 text-start">
                            <label for="confirmPass" class="form-label text-secondary text-uppercase fw-semibold" style="font-size: 0.75rem;">
                                Confirmar Contraseña
                            </label>
                            <input type="password" id="confirmPass" name="confirmPass" minlength="4" required class="form-control" placeholder="••••••••">
                            
                            <!-- Mensaje de error si no coinciden -->
                            <div id="passMatchFeedback" class="text-danger small mt-2 d-none">
                                <i class="bi bi-exclamation-circle-fill me-1"></i> Las contraseñas no coinciden.
                            </div>
                        </div>
                    </div>

                    <!-- Botonera -->
                    <div class="modal-footer pt-0 d-flex gap-3 justify-content-end border-0">
                        <button type="button" class="btn btn-outline-secondary px-4 py-2" data-bs-dismiss="modal">
                            Cancelar
                        </button>
                        <button type="button" id="btnChangePass" class="btn btn-primary px-4 py-2 fw-semibold" id="savePassBtn">
                            Guardar Cambios
                        </button>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <!-- Contenedor para Notificaciones Flotantes (Toasts de Bootstrap) -->
    <div class="toast-container position-fixed bottom-0 end-0 p-4">
        <div id="successToast" class="toast toast-premium text-black" role="alert" aria-live="assertive" aria-atomic="true" data-bs-delay="4000">
            <div class="d-flex">
                <div class="toast-body d-flex align-items-center gap-3">
                    <div class="bg-success bg-opacity-20 text-success rounded-circle d-flex align-items-center justify-content-center" style="width: 32px; height: 32px;">
                        <i class="bi bi-check2-circle fs-5"></i>
                    </div>
                    <div>
                        <strong class="text-black d-block">¡Envio Exitoso!</strong>
                        <span id="toastMessage" class="small text-black">Tu correo ha sido procesado de manera correcta.</span>
                    </div>
                </div>
                <button type="button" class="btn-close btn-close-black m-auto me-3" data-bs-toast="dismiss" data-bs-dismiss="toast" aria-label="Cerrar"></button>
            </div>
        </div>
    </div>
