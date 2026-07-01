<!DOCTYPE html>
<html lang="es">
<head>
    <?php
        require_once APP_DIR_TEMPLATE . 'includes/head.php';

        if(isset($this->scripts) && is_array($this->scripts)){
            foreach($this->scripts as $script){
                echo '<script defer src="' . APP_URL . $script . '"></script>';
            }
        }

        if(isset($this->modules) && is_array($this->modules)){
            foreach($this->modules as $module){
                echo '<script type="module" src="' . APP_URL . $module . '"></script>';
            }
        }
        
        // 1. Carga o genera tu imagen (ej. desde el servidor)
        $tipo = pathinfo(APP_FILE_LOGO, PATHINFO_EXTENSION);
        $datos_imagen = file_get_contents(APP_FILE_LOGO);
 
        // 2. Convierte la imagen a Base64 y guárdala en una variable
        $logo = 'data:image/' . $tipo . ';base64,' . base64_encode($datos_imagen);

    ?>
</head>
<body class="min-vh-100 d-flex flex-column justify-content-between p-0 m-0">
    <header class="container-fluid" style="background-color: #2f9576;">
        <?php
            if (isset($_SESSION['usuarioId'])) {
                require_once APP_DIR_TEMPLATE . "includes/menu.php";
            }
            
            
            // require_once APP_DIR_TEMPLATE . "includes/breadcrumb.php";
        ?>
    </header>
    <main class="container-fluid d-flex flex-column flex-shrink-0 p-4 min-vh-100" style="background-color: #1c5a47">
        <?php
            require_once APP_DIR_VIEWS . $this->view;
        ?>
        </div>
    </main>
    <footer class="footer mt-auto container-fluid" style="background-color: #2f9576;">
        <?php
            if (isset($_SESSION['usuarioId'])) {
                require_once APP_DIR_TEMPLATE . "includes/footer.php";
            }
        ?>
    </footer>
    <section>
    <?php
        // require_once APP_DIR_TEMPLATE . 'includes/modals.php';

        // if(isset($this->modals) && is_array($this->modals)){
        //     foreach($this->modals as $modal){
        //         require_once $modal;
        //     }
        // }
    ?>
    </section>
</body>
</html>