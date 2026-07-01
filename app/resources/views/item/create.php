        <div class="main-content  row justify-content-center">
            <div class="col-lg-10">

                <header class="d-flex flex-column justify-content-between align-items-start mb-4 border-bottom pb-3">
                    <div>
                        <h1 class="h2 text-light"><svg xmlns="http://www.w3.org/2000/svg" width="60" height="60" fill="currentColor" class="bi bi-archive px-2" viewBox="0 0 16 16">
                            <path d="M0 2a1 1 0 0 1 1-1h14a1 1 0 0 1 1 1v2a1 1 0 0 1-1 1v7.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 12.5V5a1 1 0 0 1-1-1zm2 3v7.5A1.5 1.5 0 0 0 3.5 14h9a1.5 1.5 0 0 0 1.5-1.5V5zm13-3H1v2h14zM5 7.5a.5.5 0 0 1 .5-.5h5a.5.5 0 0 1 0 1h-5a.5.5 0 0 1-.5-.5"/>
                        </svg>Agregar Producto</h1>
                    </div>
                    <p class="text-light">Complete los datos para Agregar un Nuevo Producto.</p>
                </header>

                <section class="card shadow-sm mb-4">
                    <div class="card-body p-4">
                        <form id="formAlta" class="needs-validation" novalidate>
                            
                            <div class="row g-3">
                                <div class="col-sm-6">
                                    <label for="nombre" class="form-label">Nombre</label>
                                    <input type="text" class="form-control" id="nombre" name="nombre" minlength="3" maxlength="20" placeholder="Nombre del Producto" required>
                                    <div class="invalid-feedback">Ingrese los nombres.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="codigo" class="form-label">Codigo</label>
                                    <input type="text" class="form-control" id="codigo" name="codigo" minlength="1" maxlength="4" placeholder="ffff" required>
                                    <div class="invalid-feedback">Ingrese el codigo.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="precio" class="form-label">Precio</label>
                                    <div class="input-group mb-3">
                                        <span class="input-group-text">$</span>
                                        <input type="number" class="form-control" id="precio" name="precio" minlength="1" maxlength="8" step="0.01" placeholder="0.00" required>
                                    </div>
                                    
                                    <div class="invalid-feedback">Ingrese el precio.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="stock" class="form-label">Stock</label>
                                    <input type="number" class="form-control" id="stock" name="stock" minlength="1" maxlength="100" placeholder="0" required>
                                    <div class="invalid-feedback">Ingrese un stock mayor a 0.</div>
                                </div>

                                <div class="col-sm-6">
                                    <label for="categoriaId" class="form-label">Categoria</label>
                                    <select class="form-select" id="categoriaId" name="categoriaId" required>
                                        <option value="" selected hidden>Seleccione una Categoria</option>
                                        <option value="3">Componente</option>
                                        <option value="2">Periferico</option>
                                        <option value="1">Monitor</option>
                                    </select>
                                    <div class="invalid-feedback">Seleccione una Categoria.</div>
                                </div>

                                <div class="col-12">
                                    <label for="descripcion" class="form-label">Descripcion</label>
                                    <textarea class="form-control" id="descripcion" name="descripcion" minlength="15" maxlength="300" rows="3" required placeholder="Agregue una descripcion..."></textarea>
                                    <div class="invalid-feedback">Ingrese un correo electrónico válido.</div>
                                </div>
                            </div>

                            <hr class="my-3">
                            
                            <div class="container-fluid mw justify-content-between align-items-center">
                                <a href="item/index" class="btn btn-outline-secondary p-2 m-1">Volver al listado</a>
                                <button type="button" id="btnRegistrar" class="btn btn-success p-2 m-1">Registrar producto</button>
                            </div>
                        </form>
                    </div>
                </section>
                <div id="successAlert" class="alert alert-success d-none" role="alert">Producto agregado</div>
            </div>
        </div>