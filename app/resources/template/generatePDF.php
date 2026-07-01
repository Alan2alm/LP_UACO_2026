<?php

// 1. Cargar el autoloader de Composer
//require_once APP_FILE_AUTOLOAD;
// 2. Importar y utilizar el namespace de Dompdf
use Dompdf\Dompdf;

$resultado = new DateTime('NOW', new DateTimeZone("America/Argentina/ComodRivadavia"));
$fechaActual = $resultado->format('Y-m-d H:i:s');

$dompdf = new Dompdf();

//$html = '<h1>HOLA</h1>';

ob_start();
include $index; // Tu archivo PHP externo
$html = ob_get_clean();

$dompdf->loadHtml($html);
//file_get_content()

// (Optional) Setup the paper size and orientation
$dompdf->setPaper('A4', 'landscape');

// Render the HTML as PDF
$dompdf->render();

// Output the generated PDF to Browser
$dompdf->stream("reporte_clientes.pdf", array("Attachment" => false));