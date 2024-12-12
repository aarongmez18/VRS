<?php
require_once '../Model/Products.php';
require_once '../Model/User.php';
require_once '../Model/Deseos.php';
require_once '../Model/Carrito.php';

session_start(); // Comienzo de la session

// Obtengo el id del producto seleccionado y el usuario actual

$user = $_SESSION['idUsuario'];

// Verificamos si se ha pasado un ID de producto
if (isset($_GET['id'])) {
    $producto_id = $_GET['id'];

    // Realizamos la consulta para obtener los detalles del producto
    $producto = new Producto();
    $datosProducto = $producto->getProductoById($producto_id);

    // Comprueba si el producto existe
    if ($datosProducto) {
        include_once('../View/detalleProductoView.php');
    } else {
        echo "Producto no encontrado.";
        echo "<a href='productos.php'>Volver a la tienda</a>";
    }
} else {
    header("Location: ../Controller/collections.php");
    exit();
}
?>




