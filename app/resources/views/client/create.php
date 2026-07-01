        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">

                <header class="d-flex flex-column justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-person px-2" viewBox="0 0 16 16">
                            <path d="M8 8a3 3 0 1 0 0-6 3 3 0 0 0 0 6m2-3a2 2 0 1 1-4 0 2 2 0 0 1 4 0m4 8c0 1-1 1-1 1H3s-1 0-1-1 1-4 6-4 6 3 6 4m-1-.004c-.001-.246-.154-.986-.832-1.664C11.516 10.68 10.289 10 8 10s-3.516.68-4.168 1.332c-.678.678-.83 1.418-.832 1.664z"/>
                        </svg>
                        Alta de Cliente</h1>
                    </div>
                    <p class="text-light">Complete los datos para registrar un nuevo Cliente.</p>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <form id="formAlta" class="needs-validation" novalidate>
                            
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="nombres" class="form-label">Nombres</label>
                                    <input type="text" class="form-control" id="nombres" name="nombres" minlength="3" maxlength="100" placeholder="Nombres" required>
                                    <div class="invalid-feedback">Ingrese los nombres.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="apellido" class="form-label">Apellido</label>
                                    <input type="text" class="form-control" id="apellido" name="apellido" minlength="1" maxlength="100" placeholder="Apellido" required>
                                    <div class="invalid-feedback">Ingrese el apellido.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="number" class="form-control" id="dni" name="dni" minlength="8" maxlength="8" placeholder="00000000" oninput="if(this.value.length > 8) this.value = this.value.slice(0,8);" required>
                                    <div class="invalid-feedback">Falta el DNI.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cuit" class="form-label">Cuit</label>
                                    <input type="number" class="form-control" id="cuit" name="cuit" minlength="11" maxlength="11" placeholder="00000000000" oninput="if(this.value.length > 11) this.value = this.value.slice(0,11);" required>
                                    <div class="invalid-feedback">Falta el Cuit.</div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="tipo" class="form-label">Tipo cliente</label>
                                    <select class="form-select" id="tipo" name="tipo" required>
                                        <option value="Particular" selected>Particular</option>
                                        <option value="Empresa">Empresa</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione un tipo.</div>
                                </div>

                                <div class="col-sm-9">
                                    <label for="razon_social" class="form-label">Razon Social</label>
                                    <input type="text" class="form-control" id="razon_social" name="razon_social" minlength="3" maxlength="100" placeholder="Correo@ejemplo.com" required>
                                    <div class="invalid-feedback">Ingrese una Razon social.</div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo" minlength="3" maxlength="50" placeholder="Correo@ejemplo.com" required>
                                    <div class="invalid-feedback">Ingrese un correo.</div>
                                </div>
                                
                                <div class="col-sm-6">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+54</span>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" minlength="3" maxlength="50" placeholder="297XXXXXXX" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10);" required>
                                    </div>
                                    <div class="invalid-feedback">Ingrese un Telefono.</div>
                                </div>

                                <div class="col-12">
                                    <label for="domicilio" class="form-label">Domicilio</label>
                                    <textarea class="form-control" id="domicilio" name="domicilio" minlength="15" maxlength="255" rows="2" required placeholder="Agregue una direccion..."></textarea>
                                    <div class="invalid-feedback">Ingrese una Direccion.</div>
                                </div>
                            <hr class="my-3">
                            
                            <div class="container-fluid mw justify-content-between align-items-center">
                                <a href="client/index" class="btn btn-outline-secondary p-2 m-1">Volver al listado</a>
                                <button type="button" id="btnRegistrar" class="btn btn-success p-2 m-1">Registrar Usuario</button>
                            </div>
                        </form>
                    </div>
                </section>
                <div id="successAlert" class="alert alert-success d-none" role="alert">Cliente agregado</div>
            </div>
        </div>