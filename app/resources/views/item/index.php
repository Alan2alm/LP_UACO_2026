        <div class="main-content p-4 shadow-sm bg-light mw-100 mh-100 vw-100 vh-100 d-flex flex-column border rounded">
            
            <section class="row mb-4">
                <div class="col-12">
                    <h2 class="border-bottom pb-2 text-primary fw-bold">
                    <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                        <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                    </svg>
                    Gestión de Productos</h2>
                </div>
            </section>

            <!--<section class="card mb-4 bg-light">
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-3">Filtros de búsqueda</h6>
                    <form id="formFilters" class="row g-3">
                        <div class="col-md-4">
                            <input id="id" name="id" type="text" class="form-control" placeholder="Buscar por Id o nombre de Producto">
                        </div>
                        <div class="col-md-3">
                            <select id="categoriaId" name="categoriaId" class="form-select">
                                <option hidden selected value="">Filtrar por Categoria</option>
                                <option value="1">Monitor</option>
                                <option value="2">Periferico</option>
                                <option value="3">Componente</option>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <input id="precio" name="precio" type="number" class="form-control" id="ProdValue" placeholder="Introduzca un Precio">
                        </div>
                        <div class="col-md-2 d-grid">
                            <button id="btnfiterList" type="button" class="btn btn-outline-secondary">Filtrar</button>
                        </div>
                        
                    </form>
                </div>
            </section>
    -->
            <section class="card mb-4 bg-light">
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-3">Filtros de búsqueda</h6>
                    <form id="formFilters" class="row g-3">
                        <!-- Ajustamos a col-md-4 cada input para que llenen la fila superior perfectamente (4+4+4 = 12) -->
                        <div class="col-md-4">
                            <input id="id" name="id" type="text" class="form-control" placeholder="Buscar por nombre de Producto">
                        </div>
                        <div class="col-md-4">
                            <select id="categoriaId" name="categoriaId" class="form-select">
                                <option hidden selected value="">Filtrar por Categoria</option>
                                <option value="1">Monitor</option>
                                <option value="2">Periferico</option>
                                <option value="3">Componente</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <input id="precio" name="precio" type="number" class="form-control" placeholder="Introduzca un Precio">
                        </div>
                        
                        <!-- Este div ahora ocupa todo el ancho (col-12), enviándolo abajo de los inputs -->
                        <div class="col-12 d-flex justify-content-end gap-2 mt-3">
                            <button id="btnClearFilters" type="reset" class="btn btn-outline-danger">Limpiar Filtros</button>
                            <button id="btnfiterList" type="button" class="btn btn-primary">Filtrar</button>
                        </div>
                    </form>
                </div>
            </section>
            
            <section class="d-flex justify-content-between align-items-center mb-3">
                <h5 class="mb-0">Listado de Productos</h5>
                <div>
                    <a id="btnNewItem" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Nuevo Producto
                    </a>
                    <form action="item/toPdf" id="formExport" class="btn" target="_blank">
                        <input type="hidden" id="categoriaId" name="categoriaId">
                        <input type="hidden" id="precio" name="precio">
                        <input type="hidden" id="id" name="id">
                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-download"></i> Exportar Listado</button>
                    </form>
                    
                </div>
            </section>

            <section class="table-responsive border rounded">
                <table id="itemsList" class="table table-hover align-middle border" style="table-layout: auto;">
                    <thead class="table-success">
                        <tr>
                            <th>Nombre</th>
                            <th>Codigo</th>
                            <th>Descripcion</th>
                            <th>Categoria</th>
                            <th>Precio</th>
                            <th>Stock</th>
                            
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </section>
        </div>