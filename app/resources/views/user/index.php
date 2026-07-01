        <div class="main-content p-4 shadow-sm bg-light mw-100 mh-100 vw-100 vh-100 d-flex flex-column border rounded">

            <section class="row mb-4">
                <div class="col-12">
                    <h2 class="border-bottom pb-2 text-primary fw-bold">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                            <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                        </svg>
                    Gestión de Usuarios</h2>
                </div>
            </section>

            <section class="card mb-4 bg-light">
                <div class="card-body">
                    <h6 class="card-title fw-bold mb-3">Filtros de búsqueda</h6>
                    <form id="formFilters" class="row g-3">
                        <!-- Ajustamos a col-md-4 cada input para que llenen la fila superior perfectamente (4+4+4 = 12) -->
                        <div class="col-md-4">
                            <input id="cuenta" name="cuenta" type="text" class="form-control" placeholder="Buscar por nombre de usuario">
                        </div>
                        <div class="col-md-4">
                            <input id="correo" name="correo" type="email" class="form-control" placeholder="Buscar por correo">
                        </div>
                        <div class="col-md-4">
                            <select id="perfil" name="perfil" class="form-select">
                                <option hidden selected value="">Filtrar por Perfil</option>
                                <option value="administrador">Administrador</option>
                                <option value="operador">Operador</option>
                            </select>
                        </div>

                        <div class="col-6 px-4">
                            <div class="row">
                                <div class="form-check col-md-6">
                                    <input class="form-check-input border border-2 border-primary" type="checkbox" value="0" id="estado" name="estado">
                                    <label class="form-check-label" for="estado">
                                        ¿Esta Inhabilitado el Usuario?
                                    </label>
                                </div>
                                <div class="form-check col-md-6">
                                    <input class="form-check-input border border-2 border-primary" type="checkbox" value="1" id="resetPass" name="resetPass">
                                    <label class="form-check-label" for="resetPass">
                                        ¿Esta la contraseña para resetear?
                                    </label>
                                </div>
                            </div>
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
                <h5 class="mb-0">Listado de Usuarios</h5>
                <div>
                    <a id="btnNewUser" class="btn btn-success">
                        <i class="bi bi-plus-circle"></i> Nuevo Usuario
                    </a>
                    <form action="user/toPdf" id="formExport" class="btn" target="_blank">
                        <input type="hidden" id="cuenta" name="cuenta">
                        <input type="hidden" id="correo" name="correo">
                        <input type="hidden" id="perfil" name="perfil">
                        <input type="hidden" id="resetPass" name="resetPass">
                        <input type="hidden" id="estado" name="estado">
                        <button type="submit" class="btn btn-outline-primary"><i class="bi bi-download"></i> Exportar Listado</button>
                    </form>
                    
                </div>
            </section>

            <section class="table-responsive border rounded">
                <table id="usersList" class="table table-hover align-middle border" style="table-layout: auto;">
                    <thead class="table-success">
                        <tr>
                            <th>Nombres</th>
                            <th>Apellido</th>
                            <th>Usuario</th>
                            <th>Correo</th>
                            <th>Perfil</th>
                            <th>Estado</th>
                            <th>Solicito Reset</th>
                            <th>Fecha Alta</th>
                            <th class="text-center">Opciones</th>
                        </tr>
                    </thead>
                    <tbody class="text-wrap">
                    </tbody>
                </table>
            </section>
        </div>