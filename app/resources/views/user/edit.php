        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">

                <header class="d-flex flex-row justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div class="col-md-6">
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people px-2" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>Datos de Producto</h1>
                        <p class="text-light">Edita los datos que sean necesarios.</p>
                    </div>
                    
                    <div class="text-light d-flex flex-column col-md-6 align-items-end">
                        <span>Estado: <p class="badge  mb-1 text-black <?php if($result['estado'] == "1") echo "bg-success"; else echo "bg-warning"; ?>"><?php if($result['estado'] == "1") echo "Activo"; else echo "Inactivo"; ?></p></span><br>
                        <small class="d-flex flex-row">Creado: <p class="px-2"><?php echo $result['fechaAlta'] ?></p></small>
                    </div>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <form id="editForm" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <input type="hidden" id="id" name="id" value="<?php echo $result['id'] ?>">
                                <div class="col-sm-6">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" minlength="3" maxlength="40" placeholder="Nombres" value="<?php echo $result['nombres'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese los nombres.</div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" minlength="3" maxlength="40" placeholder="apellido" value="<?php echo $result['apellido'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese un apellido.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cuenta" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="cuenta" name="cuenta" minlength="1" maxlength="40" placeholder="ffff" value="<?php echo $result['cuenta'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese la Cuenta.</div>
                                </div>

                                <div class="col-sm-6" <?php if($result['id'] == $_SESSION['usuarioId']) echo "hidden"; ?>>
                                    <label for="perfil" class="form-label">Perfil</label>
                                    <select class="form-select" id="perfil" name="perfil" disabled required>
                                        <option value="Administrador" <?php if($result['perfil'] == "Administrador") echo "selected";?>>Administrador</option>
                                        <option value="Operador" <?php if($result['perfil'] == "Operador") echo "selected";?>>Operador</option>
                                    </select>
                                </div>

                                <div class="col-sm-12">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo" minlength="3" maxlength="40" placeholder="Correo@ejemplo.com" value="<?php echo $result['correo'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese un correo.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Opciones</label>
                                    
                                    <div class="form-check" <?php if($result['id'] == $_SESSION['usuarioId']) echo "hidden"; ?>>
                                        <input type="hidden" name="estado" value="0">
                                        <input class="form-check-input border border-2 border-primary" type="checkbox" value="1" id="estado" name="estado" <?php if($result['estado'] == "1") echo "checked";?> disabled>
                                        <label class="form-check-label" for="estado">
                                            Habilitar usuario
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input type="hidden" name="resetPass" value="0">
                                        <input class="form-check-input border border-2 border-primary" type="checkbox" value="1" id="resetPass" name="resetPass" <?php if($result['resetPass'] == "1") echo "checked";?> disabled>
                                        <label class="form-check-label" for="resetPass">
                                            Restaurar la contraseña al iniciar sesion
                                        </label>
                                    </div>
                                </div>

        
                            </div>

                            <div class="mt-4 pt-3 border-top d-flex flex-wrap gap-2">
                                <button type="button" id="btnEdit" class="btn btn-primary">Editar Información</button>
                                <button type="button" id="btnUpdate" class="btn btn-success d-none">Actualizar</button>
                                <button type="button" id="btnCancel" class="btn btn-outline-danger d-none">Cancelar</button>
                                <a href="user/index" class="btn btn-link text-decoration-none ms-auto">Volver al listado</a>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>