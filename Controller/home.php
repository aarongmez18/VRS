<?php
// Incluimos las tablas de la base de datos
require_once '../Model/Products.php';
require_once '../Model/User.php';
require_once '../Model/Deseos.php';
require_once '../Model/Carrito.php';

 session_start(); // Comienzo de la session

//  Si es la primera vez que abre el navegador crearemos la sesión
if(!isset($_SESSION['logueado'])){
   $_SESSION['logueado'] = false;
} 

//  Comprobaremos si el usuario ha iniciado sesión antes o esta como invitado
if ($_SESSION['logueado'] == false){
   $user = new User();
   $_SESSION['cuentaUsuario'] = $user->getUsuarioInvitado();
   $_SESSION['idUsuario'] = $_SESSION['cuentaUsuario']->getId();
   $_SESSION['nombreUsuario'] = $_SESSION['cuentaUsuario']->getUsuario();
   $_SESSION['contrasenaUsuario'] = $_SESSION['cuentaUsuario']->getContrasena();
   $_SESSION['emailUsuario'] = $_SESSION['cuentaUsuario']->getCorreo();
   $_SESSION['logueado'] = false;

   // Borraremos los datos guardados de la cuenta invitado
   $deseos = new Deseos();
   $carrito = new Carrito();
   $carrito->deleteUser($user->getUsuarioInvitado()->getId());
   $deseos->deleteUser($user->getUsuarioInvitado()->getId());


}else{
   $_SESSION['logueado'] = true;
}
 // Obtenemos el ID del usuario actual desde la sesión
 $userId = $_SESSION['idUsuario'];




//  Elegimos 6 productos aleatorios para mostrarlo
 $productos = new Producto();
 $productos = Producto::getProductosAleatorios();




 require_once('../View/index.php');



?> 

