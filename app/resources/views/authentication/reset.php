<div class="container-fluid vh-100 d-flex justify-content-center align-items-center m-0">
    <div class="col-12 col-sm-9 col-md-7 col-lg-4 col-xl-3 bg-body bg-gradient text-center px-3 px-sm-4 py-5 border rounded shadow-sm">
        <div class="loginBox w-100">
            <div class="text-center mb-4">
                <h2 class="fw-bold text-success h3 text-wrap">Restaurar Contraseña</h2>
                <p class="text-muted small text-wrap">Ingrese una nueva contraseña.</p>
            </div>

            <form id="resetPassForm" action="authentication/reset" method="POST" class="w-100">
                <input type="hidden" id="id" name="id" value="<?php echo $identificador ?>">
                <input type="hidden" id="correo" name="correo" value="<?php echo $correo ?>">
                <div class="text-start mb-4">
                    <label for="clave" class="form-label fw-semibold small">Contraseña</label>
                    <input type="password" id="clave" name="clave" minlength="4" class="form-control w-100" placeholder="*******" required>
                </div>

                <div class="d-grid border-top pt-3">
                    <button type="submit" class="btn btn-primary btn-lg w-100" id="btnConfirm">Confirmar</button>
                </div>
            </form>

            <div class="mt-4 text-center border-top pt-3 text-danger">
                <h3><?php if(!empty($error))echo $error;?></h3>
            </div>
        </div>
    </div>
</div>