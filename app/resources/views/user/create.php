<!--        <div class="main-content row justify-content-center">
            <div class="col-md-6 col-6">
                
                <header class="mb-4 shadow-sm bg-light border rounded p-2">
                    <h1 class="display-5 text-primary fw-bold"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person" viewBox="0 0 16 16">
                        <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                    </svg>
                    Alta de Usuario</h1>
                    <p class="text-black">Complete los datos para registrar una nueva cuenta.</p>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body">
                        <form id="userForm" class="needs-validation" novalidate>
                            
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" placeholder="Nombre" required>
                                    <div class="invalid-feedback">Ingrese los nombres.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" placeholder="Apellido" required>
                                    <div class="invalid-feedback">Ingrese el apellido.</div>
                                </div>

                                <div class="col-12">
                                    <label for="cuenta" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="cuenta" minlength="5" placeholder="Usuario" required>
                                    <div class="invalid-feedback">Falta el nombre de Usuario.</div>
                                </div>

                                <div class="col-12">
                                    <label for="perfil" class="form-label">Perfil</label>
                                    <select class="form-select" id="perfil" required>
                                        <option value="" selected hidden>Seleccione un perfil</option>
                                        <option value="operador">Operador</option>
                                        <option value="administrador">Administrador</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione un perfil.</div>
                                </div>

                                <div class="col-12">
                                    <label for="correo" class="form-label">Correo Electrónico</label>
                                    <input type="email" class="form-control" id="correo" minlength="10" placeholder="nombre@ejemplo.com" required>
                                    <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="clave" class="form-label">Clave</label>
                                    <input type="password" class="form-control" id="clave" placeholder="**********" required>
                                    <div class="invalid-feedback">La clave es obligatoria.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="confirmClave" class="form-label">Confirmar Clave</label>
                                    <input type="password" class="form-control" id="confirmClave" placeholder="********" required>
                                    <div class="invalid-feedback">Debe confirmar la clave.</div>
                                </div>
                            </div>

                            <hr class="my-3">
                            
                            <div class="container-fluid mw justify-content-between align-items-center">
                                <a href="user/index" class="btn btn-outline-secondary p-2 m-1">Volver al listado</a>
                                <button type="submit" class="btn btn-success p-2 m-1">Validar y Guardar</button>
                            </div>
                        </form>
                    </div>
                </section>
                <div id="successAlert" class="alert alert-success d-none" role="alert">Registro creado</div>
            </div>
        </div>-->


        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">

                <header class="d-flex flex-column justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person px-2" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                        Alta de Usuario</h1>
                    </div>
                    <p class="text-light">Complete los datos para registrar una nueva cuenta.</p>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <form id="formAlta" class="needs-validation" novalidate>
                            
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" minlength="3" maxlength="50" placeholder="Nombres" required>
                                    <div class="invalid-feedback">Ingrese los nombres.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" minlength="1" maxlength="50" placeholder="Apellido" required>
                                    <div class="invalid-feedback">Ingrese el apellido.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cuenta" class="form-label">Nombre de Usuario</label>
                                    <input type="text" class="form-control" id="cuenta" name="cuenta" minlength="5" placeholder="Usuario" required>
                                    <div class="invalid-feedback">Falta el nombre de Usuario.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="perfil" class="form-label">Perfil</label>
                                    <select class="form-select" id="perfil" name="perfil" required>
                                        <option value="Operador" selected>Operador</option>
                                        <option value="Administrador">Administrador</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione un perfil.</div>
                                </div>
                                
                                <div class="col-sm-12">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo" minlength="3" maxlength="50" placeholder="Correo@ejemplo.com" required>
                                    <div class="invalid-feedback">Ingrese un correo.</div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="clave" class="form-label">Contraseña</label>
                                    <input type="password" class="form-control" id="clave" name="clave" minlength="3" maxlength="50" placeholder="********" required>
                                    <div class="invalid-feedback">Ingrese una contraseña.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="claveConfirm" class="form-label">Confirmar Contraseña</label>
                                    <input type="password" class="form-control" id="claveConfirm" minlength="3" maxlength="50" placeholder="********" required>
                                    <div class="invalid-feedback">escriba la contraseaña elegida.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label class="form-label">Opciones</label>
                                    
                                    <div class="form-check">
                                        <input type="hidden" name="estado" value="0">
                                        <input class="form-check-input" type="checkbox" value="1" id="estado" name="estado" checked>
                                        <label class="form-check-label" for="estado">
                                            Habilitar usuario al crearlo
                                        </label>
                                    </div>

                                    <div class="form-check">
                                        <input type="hidden" name="resetPass" value="0">
                                        <input class="form-check-input" type="checkbox" value="1" id="resetPass" name="resetPass">
                                        <label class="form-check-label" for="resetPass">
                                            Solicitar al Usuario restaurar la contraseña al iniciar sesion
                                        </label>
                                    </div>
                                </div>
                            <hr class="my-3">
                            
                            <div class="container-fluid mw justify-content-between align-items-center">
                                <a href="user/index" class="btn btn-outline-secondary p-2 m-1">Volver al listado</a>
                                <button type="button" id="btnRegistrar" class="btn btn-success p-2 m-1">Registrar Usuario</button>
                            </div>
                        </form>
                    </div>
                </section>
                <div id="successAlert" class="alert alert-success d-none" role="alert">Usuario agregado</div>
            </div>
        </div>