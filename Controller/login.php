<?php
require_once '../Model/User.php';
session_start(); 
//  Comprobaremos si el usuario ha iniciado sesión antes o esta como invitado
if ($_SESSION['logueado'] == false && isset($_SESSION['nombreUsuario']) == 'invitado'){
    $user = new User();
    $_SESSION['cuentaUsuario'] = $user->getUsuarioInvitado();
    $_SESSION['idUsuario'] = $_SESSION['cuentaUsuario']->getId();
    $_SESSION['nombreUsuario'] = $_SESSION['cuentaUsuario']->getUsuario();
    $_SESSION['contrasenaUsuario'] = $_SESSION['cuentaUsuario']->getContrasena();
    $_SESSION['emailUsuario'] = $_SESSION['cuentaUsuario']->getCorreo();
    $_SESSION['logueado'] = false;
 
 }else{
    $_SESSION['logueado'] = true;
 }
require_once('../View/loginView.php');
$_SESSION['error'] = null;
