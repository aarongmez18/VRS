<?php
require_once '../Model/Carrito.php';
session_start();

// Verificar si se ha recibido el ID del producto
if (isset($_POST['id_producto'])) {
    $userId = $_POST['userId'];
    $productId = $_POST['id_producto'];
    $precio = $_POST['precio'];

    $carrito = new Carrito();
    $nuevaCantidad = $carrito->disminuirCantidad($userId, $productId);

    $totalPrecio = $precio * $nuevaCantidad;

    // Retornar la nueva cantidad como JSON
    echo json_encode(['cantidad' => $nuevaCantidad, 'producto' => $productId, 'precio' => $totalPrecio]);
}
?>
