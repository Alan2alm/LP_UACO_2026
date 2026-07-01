<main class="main-content p-4 shadow-sm bg-light mw-100 mh-100 vw-100 vh-100 d-flex flex-column border rounded">
    <div class="border-bottom border-2 pb-2">
        <h2 class="text-primary fw-bold">
            <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-house" viewBox="0 0 16 16">
                            <path d="M8.707 1.5a1 1 0 0 0-1.414 0L.646 8.146a.5.5 0 0 0 .708.708L2 8.207V13.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V8.207l.646.647a.5.5 0 0 0 .708-.708L13 5.793V2.5a.5.5 0 0 0-.5-.5h-1a.5.5 0 0 0-.5.5v1.293zM13 7.207V13.5a.5.5 0 0 1-.5.5h-9a.5.5 0 0 1-.5-.5V7.207l5-5z"/>
                        </svg> ¡Bienvenido <?php print($_SESSION['usuario'])?>! </h2>
    </div>

    <div class="row g-3 pt-3">
        <div class="col-md-4">
            <div class="card h-100 border-start border-success border-4 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h6 class="text-muted text-uppercase small font-weight-bold">Cantidad de Clientes</h6>
                    <div class="h3 font-weight-bold text-dark mb-0">
                        <?php echo $cantClientes['total'] ?? '0'; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="card h-100 border-start border-info border-4 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h6 class="text-muted text-uppercase small font-weight-bold">Cantidad de Ventas</h6>
                    <div class="h3 font-weight-bold text-dark mb-0">
                        <?php echo $cantVentas['total'] ?? '0'; ?>
                    </div>
                </div>
            </div>
        </div>

        <?php if (isset($_SESSION['usuarioId']) && $_SESSION['perfil'] === 'Administrador') {
                        echo 
                        '<div class="col-md-4">
                            <div class="card h-100 border-start border-primary border-4 shadow-sm">
                                <div class="card-body d-flex flex-column justify-content-center">
                                    <h6 class="text-muted text-uppercase small font-weight-bold">Usuarios Registrados</h6>
                                    <div class="h3 font-weight-bold text-dark mb-0">'
                                        . ($cantUsuarios['total'] ?? '0') .
                                    '</div>
                                </div>
                            </div>
                        </div>';
        }; ?>

        

        <div class="col-12">
            <div class="card h-100 border-start border-warning border-4 shadow-sm">
                <div class="card-body d-flex flex-column justify-content-center">
                    <h6 class="text-muted text-uppercase small font-weight-bold">Ganancias</h6>
                    <div class="h3 font-weight-bold text-dark mb-0">
                        $<?php echo number_format($total_ganancias['total'] ?? 0, 2); ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-12 d-flex justify-content-evenly border-top border-2 pt-3">
            <a class="col-md-2 btn btn-outline-primary" href="item/index">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-box-seam" viewBox="0 0 16 16">
                    <path d="M8.186 1.113a.5.5 0 0 0-.372 0L1.846 3.5l2.404.961L10.404 2zm3.564 1.426L5.596 5 8 5.961 14.154 3.5zm3.25 1.7-6.5 2.6v7.922l6.5-2.6V4.24zM7.5 14.762V6.838L1 4.239v7.923zM7.443.184a1.5 1.5 0 0 1 1.114 0l7.129 2.852A.5.5 0 0 1 16 3.5v8.662a1 1 0 0 1-.629.928l-7.185 2.874a.5.5 0 0 1-.372 0L.63 13.09a1 1 0 0 1-.63-.928V3.5a.5.5 0 0 1 .314-.464z"/>
                </svg>
            Productos</a>

            <a class="col-md-2 btn btn-outline-primary" href="sale/index">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-calculator" viewBox="0 0 16 16">
                    <path d="M12 1a1 1 0 0 1 1 1v12a1 1 0 0 1-1 1H4a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1zM4 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2z"/>
                    <path d="M4 2.5a.5.5 0 0 1 .5-.5h7a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-.5.5h-7a.5.5 0 0 1-.5-.5zm0 4a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm3-6a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v1a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5zm0 3a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5v4a.5.5 0 0 1-.5.5h-1a.5.5 0 0 1-.5-.5z"/>
                </svg>Ventas
            </a>

            <a class="col-md-2 btn btn-outline-primary" href="client/index">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-basket" viewBox="0 0 16 16">
                    <path d="M5.757 1.071a.5.5 0 0 1 .172.686L3.383 6h9.234L10.07 1.757a.5.5 0 1 1 .858-.514L13.783 6H15a1 1 0 0 1 1 1v1a1 1 0 0 1-1 1v4.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 1 13.5V9a1 1 0 0 1-1-1V7a1 1 0 0 1 1-1h1.217L5.07 1.243a.5.5 0 0 1 .686-.172zM2 9v4.5A1.5 1.5 0 0 0 3.5 15h9a1.5 1.5 0 0 0 1.5-1.5V9zM1 7v1h14V7zm3 3a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 4 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 6 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3A.5.5 0 0 1 8 10m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5m2 0a.5.5 0 0 1 .5.5v3a.5.5 0 0 1-1 0v-3a.5.5 0 0 1 .5-.5"/>
                </svg>
                Clientes
            </a>

            <?php if (isset($_SESSION['usuarioId']) && $_SESSION['perfil'] === 'Administrador') {
                            echo 
                            '<a class="col-md-2 btn btn-outline-primary" href="user/index">
                            <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" fill="currentColor" class="bi bi-people" viewBox="0 0 16 16">
                                <path d="M15 14s1 0 1-1-1-4-5-4-5 3-5 4 1 1 1 1zm-7.978-1L7 12.996c.001-.264.167-1.03.76-1.72C8.312 10.629 9.282 10 11 10c1.717 0 2.687.63 3.24 1.276.593.69.758 1.457.76 1.72l-.008.002-.014.002zM11 7a2 2 0 1 0 0-4 2 2 0 0 0 0 4m3-2a3 3 0 1 1-6 0 3 3 0 0 1 6 0M6.936 9.28a6 6 0 0 0-1.23-.247A7 7 0 0 0 5 9c-4 0-5 3-5 4q0 1 1 1h4.216A2.24 2.24 0 0 1 5 13c0-1.01.377-2.042 1.09-2.904.243-.294.526-.569.846-.816M4.92 10A5.5 5.5 0 0 0 4 13H1c0-.26.164-1.03.76-1.724.545-.636 1.492-1.256 3.16-1.275ZM1.5 5.5a3 3 0 1 1 6 0 3 3 0 0 1-6 0m3-2a2 2 0 1 0 0 4 2 2 0 0 0 0-4"/>
                            </svg>
                            Usuarios</a>';
                        }; ?>
        </div>

        
    </div>

    
</main>