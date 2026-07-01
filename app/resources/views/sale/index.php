        <div class="main-content p-4 shadow-sm bg-light mw-100 mh-100 vw-100 vh-100 d-flex flex-column border rounded">
            
            <section class="row mb-4">
                <div class="col-12">
                    <h2 class="border-bottom pb-2 text-primary fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                            <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                            <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                        </svg>
                    Gestión de Ventas</h2>
                </div>
            </section>

            <section class="card mb-4 bg-light">
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-3">Filtros de búsqueda</h6>
                    <form id="formFilters" class="row g-3">
                        <div class="col-md-3">
                            <label for="fechaInicio">Fecha de Inicio:</label>
                            <input type="date" id="fechaInicio" name="fechaInicio">
                        </div>
                        <div class="col-md-3">
                            <label for="fechaFin">Fecha de Fin:</label>
                            <input type="date" id="fechaFin" name="fechaFin">
                        </div>
                        <div class="col-md-3">
                            <input id="cliente" name="cliente" type="text" class="form-control" placeholder="Buscar por Razon social de Cliente">
                        </div>

                        <div class="col-md-3">
                            <input id="numero_venta" name="numero_venta" type="text" class="form-control" placeholder="Buscar por numero de Venta">
                        </div>
        
                        <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                            <button id="btnClearFilters" type="reset" class="btn btn-outline-danger">Limpiar Filtros</button>
                            <button id="btnfiterList" type="button" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>
                </div>
            </section>
            
            <section class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Listado de Ventas</h5>
                <div>
                    <a id="btnNewSale" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Nueva Venta
                    </a>
                    <form action="sale/toPdf" id="formExport" class="btn" target="_blank">
                        <input type="hidden" id="categoriaId" name="categoriaId">
                        <input type="hidden" id="precio" name="precio">
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-download"></i> Exportar Listado</button>
                    </form>
                </div>
            </section>

            <section class="table-responsive border rounded">
                <table id="salesList" class="table table-hover align-middle border" style="table-layout: auto;">
                    <thead class="table-success">
                        <tr>
                            <th>Nro. Venta</th>
                            <th>Cliente</th>
                            <th>Fecha</th>
                            <th>Forma de Pago</th>
                            <th>Cod. Producto</th>
                            <th>Cantidad</th>
                            <th>Precio Unitario</th>
                            <th>Total</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-wrap">
                    </tbody>
                </table>
            </section>
        </div>