<?php
require_once '../Model/Products.php';
require_once '../Model/User.php';
require_once '../Model/Carrito.php';

session_start();

// Obtenemos el ID del usuario actual desde la sesión
$userId = $_SESSION['idUsuario'];
$producto = null;
$totalPrecio = 0;
$carrito = new Carrito();

// Obtenemos los productos del carrito del usuario actual
$miCarrito = $carrito->getCarritoUsuario($userId);

// Arreglo para almacenar las cantidades de productos
$cantidadProductos = [];

// Recorremos el array de productos del carrito del usuario actual

foreach ($miCarrito as $idProducto) {
    $producto = Producto::getProductosById($idProducto);

    // Obtenemos la cantidad de cada producto
    $cantidad = $carrito->getCarritoCantidad($userId, $idProducto);

    // Guardamos la cantidad en el arreglo sumiendo que siempre existira una cantidad existente
    $cantidadProductos[$idProducto] = $cantidad[0]; 

    // Sumamos el precio total multiplicado por la cantidad
    $precioProducto = $producto->getPrecio();
    $totalPrecio += $precioProducto * $cantidad[0];
    
}
require_once('../View/carritoView.php');
?>
