        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">
                
                <header class="d-flex flex-column justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-archive px-2" viewBox="0 0 16 16">
                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        </svg>Datos de Producto</h1>
                    </div>
                    <p class="text-light">Edita los datos que sean necesarios.</p>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <form id="editForm" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <input type="hidden" id="id" name="id" value="<?php echo $result['id'] ?>">
                                <div class="col-sm-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" minlength="3" maxlength="20" placeholder="Nombre" value="<?php echo $result['nombre'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese los nombre.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="codigo" class="form-label">Codigo</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" minlength="1" maxlength="4" placeholder="ffff" value="<?php echo $result['codigo'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese el codigo.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="precio" class="form-label">Precio</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="precio" name="precio" minlength="1" maxlength="8" step="0.01" placeholder="0.00" value="<?php echo $result['precio'] ?>" disabled required>
                                    </div>
                                    <div class="invalid-feedback">Ingrese el precio.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" minlength="1" maxlength="100" placeholder="0" value="<?php echo $result['stock'] ?>" disabled required>
                                    <div class="invalid-feedback">Ingrese un stock mayor a 0.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="categoriaId" class="form-label">Categoria</label>
                                    <select class="form-select" id="categoriaId" name="categoriaId" disabled required>
                                        <option value="3" <?php if($result['categoriaId'] == 3)echo "selected";?>>Componente</option>
                                        <option value="2" <?php if($result['categoriaId'] == 2)echo "selected";?>>Periferico</option>
                                        <option value="1" <?php if($result['categoriaId'] == 1)echo "selected";?>>Monitor</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione una Categoria.</div>
                                </div>

                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" minlength="15" maxlength="300" rows="3" placeholder="Agregue una descripcion..." disabled required><?php echo $result['descripcion'] ?></textarea>
                                    <div class="invalid-feedback">Ingrese una Descripcion con un rango valido.</div>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-top d-flex flex-wrap gap-2">
                                <button type="button" id="btnEdit" class="btn btn-primary">Editar Información</button>
                                <button type="button" id="btnUpdate" class="btn btn-success d-none">Actualizar</button>
                                <button type="button" id="btnCancel" class="btn btn-outline-danger d-none">Cancelar</button>
                                <a href="item/index" class="btn btn-link text-decoration-none ms-auto">Volver al listado</a>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>