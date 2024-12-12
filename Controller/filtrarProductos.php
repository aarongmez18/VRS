<?php
require_once '../Model/VarosiDB.php';
require_once '../Model/Products.php';

// Recibimos el filtro por el método GET, en caso contrario establecemos por defecto el filtro normal
$filtro = isset($_GET['filtro']) ? $_GET['filtro'] : 'normal';

// Accedemos a la base de datos
$conexion = VarosiDB::connectDB();
$seleccion = "SELECT id, nombre, descripcion, imagen, precio FROM products";

if ($filtro !== 'normal') {
    if ($filtro === 'ascendente') {
        $seleccion .= " ORDER BY precio ASC";
    } else if ($filtro === 'descendente') {
        $seleccion .= " ORDER BY precio DESC";
    }else{
        $seleccion .= " ORDER BY id DESC";
    }
}


$consulta = $conexion->query($seleccion);

// Creamos un array para almacenar los productos filtrados
$productos = [];

// Recorre la base de datos y lo inserta
while ($registro = $consulta->fetchObject()) {
    $producto = new Producto($registro->id, $registro->nombre, $registro->descripcion, $registro->imagen, $registro->precio);
    $productos[] = $producto->toArray(); // Usar el método toArray()
}

// $productos = serialize($productos);
// Verificar los productos obtenidos



// Devolvemos los productos filtrados en formato JSON
echo json_encode($productos);

?>