<?php
require_once '../Model/Products.php';
require_once '../Model/User.php';
require_once '../Model/Deseos.php';

// Inicia la sesión
session_start();

// Obtenemos el ID del usuario actual desde la sesión
$userId = $_SESSION['idUsuario'];
$producto = null;
$listaDeseos = new Deseos();
// Obtenemos los productos deseados del usuario actual
$misDeseos = $listaDeseos->getDeseosUsuario($userId);



$productos = new Producto();
// Recorremos el array de productos deseados del usuario actual
foreach ($misDeseos as $idProducto) {
    // Obtenemos el producto por ID
    $producto = Producto::getProductosById($idProducto);

}

require_once('../View/wishlistView.php');

?>