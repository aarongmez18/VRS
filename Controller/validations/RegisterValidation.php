<?php
  require_once '../../Model/User.php';

  // Creamos una sesion
  session_start();

    $usuario = $_POST['usuario'];
    $email = $_POST['correo'];

    // Convertimos el usuario y correo en minusculas
    $usuario = strtolower($usuario);
    $email = strtolower($email);

    $contrasena = $_POST['contrasena'];
    $confirmar_contrasena = $_POST['confirmarContraseña'];


    

    // Sacar todos los correos y despues si coinciden sacar mensaje de alerta para  no guardar en la base de datos

    $cuentas = new User(null,null,null,null);

    // Almacenamos todos los correos y los usuarios
    $correos_encontrados = $cuentas->getEmails();
    $usuarios_encontrados = $cuentas->getUsernames();

    foreach ($usuarios_encontrados as $usuarios) {
      if ($usuarios == $usuario) {
        // El usuario esta ya registrado, por tanto se enviara de nuevo a la pagina de registro
        $_SESSION['error'] = 'Esta cuenta ya exíste';
        $_SESSION['logueado'] == false;
        header('Location: ../register.php');
        exit();
      }
    }

  

    // Buscamos si existe alguna coincidencia con la base de datos
    foreach ($correos_encontrados as $correo) {
      if ($correo == $email) {
        // El correo esta ya registrado, por tanto se enviara de nuevo a la pagina de registro
        $_SESSION['error'] = 'Correo ya está registrado';
        $_SESSION['logueado'] == false;
        header('Location: ../register.php');
        exit();
      }
    }


    // Validamos las contraseñas que coincidan
    if ($contrasena != $confirmar_contrasena) {
      $_SESSION['error'] = 'Las contraseñas no coinciden';
      $_SESSION['logueado'] == false;
      header('Location: ../register.php');
      exit;
    }

if ($_SESSION['logueado'] == false) {

                


                 // Crear un nuevo objeto User y guardar los datos en la base de datos
                 $user = new User(null,$usuario, $email, $contrasena);
                 $user->insert();
                 
                 $_SESSION['cuentaUsuario'] = $user;
                 $_SESSION['idUsuario'] = $user->getId();
                 $_SESSION['nombreUsuario'] = $user->getUsuario();
                 $_SESSION['contrasenaUsuario'] = $user->getContrasena();
                 $_SESSION['emailUsuario'] = $user->getCorreo();
                 $_SESSION['logueado'] = true;
                 $_SESSION['error'] = null;
                //  header('Location: ../Controller/home.php');
}





  
    

            
