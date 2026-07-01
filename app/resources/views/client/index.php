        <div class="main-content p-4 shadow-sm bg-light mw-100 mh-100 vw-100 vh-100 d-flex flex-column border rounded">
            <section class="row mb-4">
                <div class="col-12">
                    <h2 class="border-bottom pb-2 text-primary fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                            <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                        </svg>
                    Gestión de Clientes</h2>
                </div>
            </section>

            <section class="card mb-4 bg-light">
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-3">Filtros de búsqueda</h6>
                    <form id="formFilters" class="row g-3">
                        <!-- Ajustamos a col-md-4 cada input para que llenen la fila superior perfectamente (4+4+4 = 12) -->
                        <div class="col-md-3">
                            <input id="nombres" name="nombres" type="text" class="form-control" placeholder="Buscar por Nombres">
                        </div>
                        <div class="col-md-3">
                            <input id="razon_social" name="razon_social" type="text" class="form-control" placeholder="Buscar por Razon Social">
                        </div>
                        <div class="col-md-3">
                            <input id="dni" name="dni" type="number" class="form-control" placeholder="Buscar por DNI" oninput="if(this.value.length > 8) this.value = this.value.slice(0,8);">
                        </div>
                        <div class="col-md-3">
                            <input id="cuit" name="cuit" type="number" class="form-control" placeholder="Buscar por Cuit" oninput="if(this.value.length > 11) this.value = this.value.slice(0,11);">
                        </div>
                        <div class="col-md-3">
                            <select id="tipo" name="tipo" class="form-select">
                                <option hidden selected value="">Filtrar por Tipo</option>
                                <option value="Particular">Particular</option>
                                <option value="Empresa">Empresa</option>
                            </select>
                        </div>

                        <div class="col-3">
                        </div>

                        <!-- Este div ahora ocupa todo el ancho (col-12), enviándolo abajo de los inputs -->
                        <div class="col-6 d-flex justify-content-end gap-2 mt-3">
                            <button id="btnClearFilters" type="reset" class="btn btn-outline-danger">Limpiar Filtros</button>
                            <button id="btnfiterList" type="button" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>
                </div>
            </section>
            
            <section class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Listado de Clientes</h5>
                <div>
                    <a id="btnNewClient" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Nuevo Cliente
                    </a>
                    <form action="client/toPdf" id="formExport" class="btn" target="_blank">
                        <input type="hidden" id="categoriaId" name="categoriaId">
                        <input type="hidden" id="precio" name="precio">
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-download"></i> Exportar Listado</button>
                    </form>
                </div>
            </section>

            <section class="table-responsive border rounded">
                <table id="clientsList" class="table table-hover align-middle border" style="table-layout: auto;">
                    <thead class="table-success">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Tipo</th>
                            <th>Razon Social</th>
                            <th>Cuit</th>
                            <th>DNI</th>
                            <th>Correo</th>
                            <th>Telefono</th>
                            <th>Domicilio</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-wrap">
                    </tbody>
                </table>
            </section>
        </div>