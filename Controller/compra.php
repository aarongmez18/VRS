<?php
  // Incluimos las tablas de la base de datos
require_once '../Model/Products.php';
require_once '../Model/User.php';
require_once '../Model/Deseos.php';
require_once '../Model/Carrito.php';

 session_start(); // Comienzo de la session

//  Variables iniciales
$producto = null;
$_SESSION['totalPrecio'] = 0;

// Obtenemos el ID del usuario actual desde la sesión
$userId = $_SESSION['idUsuario'];

// Obtenemos los productos del carrito del usuario actual
$carrito = new Carrito();
$miCarrito = $carrito->getCarritoUsuario($userId);

 //  Elegimos 6 productos aleatorios para mostrarlo
 $productos = new Producto();
 $productos = Producto::getProductosAleatorios();

 foreach ($miCarrito as $idProducto) {
  $producto = Producto::getProductosById($idProducto);

  // Obtenemos la cantidad de cada producto
  $cantidad = $carrito->getCarritoCantidad($userId, $idProducto);

  //Agregamos la cantidad de cada producto al array para el cálculo del total
  $cantidadProductos[$idProducto] = $cantidad[0]; 

  // Sumamos el precio total multiplicado por la cantidad
  $precioProducto = $producto->getPrecio();
  $_SESSION['totalPrecio'] += $precioProducto * $cantidad[0];
 }


 require_once('../View/comprarView.php');