<?php
 require_once '../Model/Products.php';
 require_once '../Model/User.php';
 require_once '../Model/Carrito.php'; 

 session_start();

// Obtenemos el ID del usuario actual desde la sesión
$userId = $_SESSION['idUsuario'];
$carrito = new Carrito();

// Obtenemos los productos del carrito del usuario actual
$miCarrito = $carrito->getCarritoUsuario($userId);


$userId = $_SESSION['idUsuario'];
$carrito = new Carrito();

// Obtenemos los productos del carrito del usuario actual
$miCarrito = $carrito->getCarritoUsuario($userId);

$total = 0; // Inicializamos el total

// Creamos un nuevo pedido
foreach ($miCarrito as $item) {

    var_dump($item);

    // Validamos que el producto exista
    $producto = Producto::getProductoById($item);

    
    // Obtenemos el precio y calculamos el total
    $precioUnitario = $producto->getPrecio();
    $cantidad = isset($item['cantidad']) ? $item['cantidad'] : 1; // Aseguramos cantidad
    $total += $cantidad * $precioUnitario;
}

var_dump($total);

$pedido = new Pedido(null, $userId, null);
?>