        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">
                
                <header class="d-flex flex-column justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-calculator-fill px-2" viewBox="0 0 16 16">
                            <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm2 .5v2a.5.5 0 0 0 .5.5h7a.5.5 0 0 0 .5-.5v-2a.5.5 0 0 0-.5-.5h-7a.5.5 0 0 0-.5.5m0 4v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M4.5 9a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM4 12.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5M7.5 6a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM7 9.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5zM10 6.5v1a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-1a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5m.5 2.5a.5.5 0 0 0-.5.5v4a.5.5 0 0 0 .5.5h1a.5.5 0 0 0 .5-.5v-4a.5.5 0 0 0-.5-.5z"/>
                        </svg>Datos de Venta</h1>
                    </div>
                    <p class="text-light">Edita los datos que sean necesarios.</p>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <form id="editForm" class="needs-validation" novalidate>
                            <div class="row g-3">
                                <input type="hidden" id="id" name="id" value="<?php echo $result['id'] ?>">
                                <div class="col-sm-6">
                                    <label for="numero_venta" class="form-label">Nro. Venta</label>
                                    <input type="text" class="form-control" id="numero_venta" name="numero_venta" minlength="1" maxlength="20" placeholder="Numero de Venta" value="<?php echo $result['numero_venta'] ?>" required disabled>
                                    <div class="invalid-feedback">Ingrese un Nro. de Venta.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="razon_social" class="form-label">Cliente (Razon social)</label>
                                    <input type="text" class="form-control" id="razon_social" name="razon_social" minlength="5" maxlength="100" value="<?php echo $result['cliente'] ?>" placeholder="Supermercado Ejemplo S.A." required disabled>
                                    <div class="invalid-feedback">Ingrese la razon social del cliente.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="codigo_producto" class="form-label">Codigo del Producto</label>
                                    <input type="text" class="form-control" id="codigo_producto" name="codigo_producto" minlength="1" maxlength="25" value="<?php echo $result['codigo_producto'] ?>" placeholder="ffff" required disabled>
                                    <div class="invalid-feedback">Ingrese un Codigo de un Producto.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="precio_unitario" class="form-label">Precio Unitario</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="precio_unitario" name="precio_unitario" minlength="1" maxlength="12" step="0.01" value="<?php echo $result['precio_unitario'] ?>" placeholder="0.00" required disabled>
                                    </div>
                                    
                                    <div class="invalid-feedback">Ingrese el precio_unitario del producto.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="cantidad" class="form-label">Cantidad</label>
                                    <input type="number" class="form-control" id="cantidad" name="cantidad" minlength="1" maxlength="100" value="<?php echo $result['cantidad'] ?>" placeholder="0" required disabled>
                                    <div class="invalid-feedback">Ingrese una cantidad mayor a 0.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="forma_pago" class="form-label">Forma de Pago</label>
                                    <select class="form-select" id="forma_pago" name="forma_pago" required disabled>
                                        <option value="Efectivo" <?php if($result['forma_pago'] == "Efectivo")echo "selected";?>>Efectivo</option>
                                        <option value="Tarjeta" <?php if($result['forma_pago'] == "Tarjeta")echo "selected";?>>Tarjeta</option>
                                        <option value="Transferencia" <?php if($result['forma_pago'] == "Transferencia")echo "selected";?>>Transferencia</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione una Forma.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="total" class="form-label">Precio Total</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="total" name="total" minlength="1" step="0.01" value="<?php echo $result['total'] ?>" placeholder="0.00" disabled>
                                    </div>
                                    <div class="invalid-feedback">Ingrese el Total.</div>
                                </div>
                            </div>

                            <div class="mt-4 pt-3 border-top d-flex flex-wrap gap-2">
                                <button type="button" id="btnEdit" class="btn btn-primary">Editar Información</button>
                                <button type="button" id="btnUpdate" class="btn btn-success d-none">Actualizar</button>
                                <button type="button" id="btnCancel" class="btn btn-outline-danger d-none">Cancelar</button>
                                <a href="sale/index" class="btn btn-link text-decoration-none ms-auto">Volver al listado</a>
                            </div>
                        </form>
                    </div>
                </section>

            </div>
        </div>