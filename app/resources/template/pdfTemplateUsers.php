<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>reporte_clientes</title>
    <style>
        @page {
        margin: 0cm 0cm;
        }
        body{
        height: auto;
        margin-top: 4cm;
        margin-left: 2cm;
        margin-right: 2cm;
        margin-bottom: 2cm;
        }
        .tabla{
            margin-top: 20px;
            border-color: black;
            border: 2px solid;
            width: 100%;
        }
        .cabezaTabla{
            border-bottom: 1px solid black;
            background-color: cyan;
            text-align: center;
        }
        .cabezaId, .cabezaApell, .cabezaDni, .cabezaDomic, .cabezaLocal, .cabezaProv, .cabezaCodP, .cabezaTelef, .cabezaEmail, .cabezaAlta{
            border-right: 1px solid black;
            text-align: center;
            border-top: 1px solid black;
        }
        .cabezaId{
            border-left: 1px solid black;
        }
        .factura{
            margin: auto;
        }
        
        .titulo{
            font-family: Helvetica, Arial, sans-serif;
            font-weight: bold;
            text-align: center;
            font-style: italic;
            color: white;
            border: 1px solid black;
            background: #333;
            color: white;  
            width: 100%;
            left: 0;
            top: 0;
            position:fixed;
            z-index: 10;
            right: 0;
            padding: 1% 0;
            /*height: 100px;*/  
        }
        .col1, .col2, .col3, .col4, .col5, .col6, .col7, .col8, .col9, .col10{
            border-right: 1px solid black;
            border-bottom: 1px solid black;
        }
        .col1{border-left: 1px solid black;}
        footer {
        position: fixed;
        bottom: 0;
        left: 0px;
        right: 0px;
        height: 50px;
        /** Extra personal styles **/
        background-color: #333;
        color: white;
        line-height: 35px;
        text-align: center;
        }
        footer .pagina:after { content: counter(page); }
    </style>
</head>
<body>
    <div class="titulo">
        <h1>Reporte de Usuarios</h1>
        <?php echo "<p> creado el ". $fechaActual ."</p>"; ?>
    </div>
    <footer>
        <div class="pagina">Copyright © <?php echo date("Y");?> - Pagina </div>
    </footer>

    <div class="factura">
        <table id="table_clientes" class="tabla">
            <thead class="cabezaTabla">
                <tr>
                    <th>Nombres</th>
                    <th>Apellido</th>
                    <th>Usuario</th>
                    <th>Correo</th>
                    <th>Perfil</th>
                    <th>Estado</th>
                    <th>Solicito Reset</th>
                    <th>Fecha Alta</th>
                </tr>
            </thead>
            <tbody>
                <?php     
                foreach($result as $item => $value){

                    if($value["estado"] == 1){
                        $estado = 'activo';
                    }else{
                        $estado = 'inactivo';
                    }

                    if($value["resetPass"] == 1){
                        $resetP = 'Necesita nueva contraseña';
                    }else{
                        $resetP = 'Contraseña funcional';
                    }

                    echo "<tr class='fila'><td class='col1'>".$value["nombres"]."</td>";
                    echo "<td class='col2'>".$value["apellido"]."</td>";
                    echo "<td class='col3'>".$value["cuenta"]."</td>";
                    echo "<td class='col4'>".$value["correo"]."</td>";
                    echo "<td class='col5'>".$value["perfil"]."</td>";
                    echo "<td class='col6'>".$estado."</td>";
                    echo "<td class='col6'>".$resetP."</td>";
                    echo "<td class='col6'>".$value["fechaAlta"]."</td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
            <tfoot>
            </tfoot>
        </table>
        
    </div>
    
    
</body>
</html>