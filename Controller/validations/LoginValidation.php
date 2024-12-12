<?php

require_once '../../Model/User.php';

// Creamos una sesion
session_start();



$usuario = $_POST['nombre'];
$contrasena = $_POST['contrasena'];


// Convertimos el usuario y correo en minusculas
$usuario = strtolower($usuario);
$contrasena = strtolower($contrasena);



// Buscar en la base de datos el usuario y la contraseña
$userBD = new User(null, $usuario, null, null);



$user = $userBD->getUserByUsernameAndPassword($usuario, $contrasena);



// Si la cuenta es la de invitados lanzaremos un error ya que este usuario será general
if ($_POST['nombre'] == 'invitado' && $_POST['contrasena'] = 'invitado') {
  // Almaceno el error en la sesión
  $_SESSION['error'] = 'Usuario o contraseña incorrectos';
  header('Location: ../login.php');
}else if ($user != null) {

//  Si el usuario existe y la contraseña coincide

  // Iniciar la sesión y almacenar los datos del usuario
  $_SESSION['cuentaUsuario'] = $user;
  $_SESSION['idUsuario'] = $user->getId();
  $_SESSION['nombreUsuario'] = $user->getUsuario();
  $_SESSION['contrasenaUsuario'] = $user->getContrasena();
  $_SESSION['emailUsuario'] = $user->getCorreo();
  $_SESSION['logueado'] = true;
  $_SESSION['error'] = null;
  header('Location: ../home.php');


  // Si el usuario no existe o la contraseña no coincide
} else {
  // Almaceno el error en la sesión
  $_SESSION['error'] = 'Usuario o contraseña incorrectos';
  header('Location: ../login.php');
}


