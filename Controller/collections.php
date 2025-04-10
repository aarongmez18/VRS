<?php
// Incluimos las tablas de la base de datos
require_once '../Model/Products.php';
require_once '../Model/User.php';

session_start(); // Comienzo de la session

// Obtenemos el ID del usuario actual desde la sesión
$userId = $_SESSION['idUsuario'];

$productos = new Producto();
$productos = Producto::getProductos();



// Mostrar las colecciones del usuario logueado
require_once('../View/coleccionesView.php');
  
 // Obtener los datos del usuario logueado
 $user = $_SESSION['nombreUsuario'];



?>