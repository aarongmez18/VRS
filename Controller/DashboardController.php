<?php
require_once '../Model/Ventas.php';

session_start();
// Creamos el objeto ventas
$ventasModel = new Ventas();
// Obtenemos las ventas desde la base de datos
$ventas = $ventasModel->obtenerVentas();

// Crea el archivo TXT 
if (isset($_POST['create_txt'])) {
    $filename = 'documento_ventas.txt';
        // Ruta de la carpeta "documents"
        $carpeta = 'documents';
        $path = $carpeta . '/' . $filename;
    $file = fopen($path, 'w');

    // Encabezado
    fwrite($file, "Reporte de Ventas\n");
    fwrite($file, "VENTAS DE PRODUCTOS TOTALES\n");
    fwrite($file, str_repeat('-', 40) . "\n");

    // Cabecera de la tabla
    fwrite($file, "ID | Fecha de Compra | Cantidad | Precio\n");
    fwrite($file, str_repeat('-', 40) . "\n");

    // Datos de la base de datos
    foreach ($ventas as $venta) {
        fwrite($file, "{$venta['id']} | {$venta['fecha']} | {$venta['cantidad']} | {$venta['precio']} € \n");
    }

    // Texto 
    fwrite($file, str_repeat('-', 40) . "\n");
    fwrite($file, "Total de ventas: ". count($ventas). "\n");
    fwrite($file, "Total en euros: ". array_sum(array_column($ventas, 'precio')) . " € \n");
    fwrite($file, "Total en dólares: ". array_sum(array_column($ventas, 'precio')) * 1.15 . " $ \n");
    fwrite($file, "Total en bitcoins: ". array_sum(array_column($ventas, 'precio')) * 0.00001668 . " BTC \n");
    fwrite($file, str_repeat('-', 40) . "\n");
    // Descripcion del documento y notas informativas
    fwrite($file, "Este documento contiene los detalles de las ventas realizadas en la web.\n");
    fwrite($file, "Puede consultarlo en la administración del sitio web.\n");
    fwrite($file, "Este documento también puede ser exportado como un archivo PDF.\n");
    fwrite($file, "Si desea obtener más información sobre nuestro sitio web, puede visitar nuestra página web.\n");
    fwrite($file, "Si desea contactar con nosotros, puede escribirnos a nuestra dirección de correo electrónico:  contacto@urbanstyle.com.\n");
    fwrite($file, "Si desea realizar algún cambio o consulta, no dude en contactar con nosotros.\n");
    fwrite($file, "Gracias por su preferencia!\n");
    fwrite($file, str_repeat('-', 40) . "\n");
    fwrite($file, "Városi Urban Style copyright");
    // Fin del documento
    fclose($file);

    // Descarga el archivo para el usuario
    header('Content-Type: text/plain');
    header('Content-Disposition: attachment; filename="' . $filename . '"');
    readfile($path);

    exit();
    // Elimina el archivo
    // unlink($filename);
}


include_once('../View/DashboardView.php');





?>
