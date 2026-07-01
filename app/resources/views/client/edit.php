        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">

                <header class="d-flex flex-row justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div class="col-md-6">
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-people px-2" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>Datos de Cliente</h1>
                        <p class="text-light">Edita los datos que sean necesarios.</p>
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
                                    <label for="dni" class="form-label">DNI</label>
                                    <input type="text" class="form-control" id="dni" name="dni" minlength="8" maxlength="8" placeholder="xxxxxxxx" value="<?php echo $result['dni'] ?>" oninput="if(this.value.length > 8) this.value = this.value.slice(0,8);" disabled required>
                                    <div class="invalid-feedback">Ingrese un DNI.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cuit" class="form-label">Cuit</label>
                                    <input type="number" class="form-control" id="cuit" name="cuit" minlength="11" maxlength="11" placeholder="xxxxxxxxxxx" value="<?php echo $result['cuit'] ?>" oninput="if(this.value.length > 11) this.value = this.value.slice(0,11);" disabled required>
                                    <div class="invalid-feedback">Falta el Cuit.</div>
                                </div>

                                <div class="col-sm-3">
                                    <label for="tipo" class="form-label">Tipo Cliente</label>
                                    <select class="form-select" id="tipo" name="tipo" disabled required>
                                        <option value="Particular" <?php if($result['tipo'] == "Particular") echo "selected";?>>Particular</option>
                                        <option value="Empresa" <?php if($result['tipo'] == "Empresa") echo "selected";?>>Empresa</option>
                                    </select>
                                </div>

                                <div class="col-sm-9">
                                    <label for="razon_social" class="form-label">Razon Social</label>
                                    <input type="text" class="form-control" id="razon_social" name="razon_social" minlength="3" maxlength="100" placeholder="Razon Social" value="<?php echo $result['razon_social'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese una Razon social.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="correo" class="form-label">Correo</label>
                                    <input type="email" class="form-control" id="correo" name="correo" minlength="3" maxlength="50" placeholder="Correo@ejemplo.com" value="<?php echo $result['correo'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese un correo.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="telefono" class="form-label">Telefono</label>
                                    <div class="input-group">
                                        <span class="input-group-text">+54</span>
                                        <input type="tel" class="form-control" id="telefono" name="telefono" minlength="3" maxlength="50" placeholder="297XXXXXXX" value="<?php echo $result['telefono'] ?>" oninput="if(this.value.length > 10) this.value = this.value.slice(0,10);" disabled required>
                                    </div>
                                    <div class="invalid-feedback">Ingrese un Telefono.</div>
                                </div>

                                <div class="col-12">
                                    <label for="domicilio" class="form-label">Domicilio</label>
                                    <textarea class="form-control" id="domicilio" name="domicilio" minlength="15" maxlength="255" rows="2" required placeholder="Agregue una direccion..." disabled required><?php echo $result['domicilio'] ?></textarea>
                                    <div class="invalid-feedback">Ingrese una Direccion.</div>
                                </div>

        
                            </div>

                            <div class="mt-4 pt-3 border-top d-flex flex-wrap gap-2">
                                <button type="button" id="btnEdit" class="btn btn-primary">Editar Información</button>
                                <button type="button" id="btnUpdate" class="btn btn-success d-none">Actualizar</button>
                                <button type="button" id="btnCancel" class="btn btn-outline-danger d-none">Cancelar</button>
                                <a href="client/index" class="btn btn-link text-decoration-none ms-auto">Volver al listado</a>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>