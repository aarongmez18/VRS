<?php
require_once '../Model/Deseos.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Almacenamos las variables 
  $userId = $_POST['userId'];
  $productId = $_POST['productId'];
  $valor = $_POST['value'];
  
  // Creamos una instancia de la clase Deseos
  $deseos = new Deseos();

  // Si el valor es 1 agreamos el producto a la base de datos
  if($valor == 1){
  // Verificamos si el producto ya está en la lista de deseos
  if ($deseos->productoExisteEnListaDeseos($userId, $productId)) {
    // Si el producto ya está en la lista de deseos, enviamos una respuesta al cliente
    echo 'El producto ya está en la lista de deseos.';
  } else {
    // Si el producto no está en la lista de deseos, lo agregamos
    if ($deseos->agregarProductoALaListaDeseos($userId, $productId)) {
      // Si el producto se agregó correctamente, enviamos una respuesta al cliente
      echo 'Producto ID: ' . $productId . ' agregado a la lista de deseos.';
    } else {
      // Si hubo un error al agregar el producto, enviamos una respuesta al cliente
      echo 'Error al agregar el producto a la lista de deseos.';
    }
  }
  }else if($valor == 2){
    // Si el valor es 2 eliminamos el producto de la base de datos
    $deseos->eliminarProductoDeLaListaDeseos($userId, $productId);
    // Enviamos respuesta al cliente
    echo 'Producto ID: ' . $productId .'eliminado de la lista de deseos.';

  }
  

  
} else {
  // Si el método de petición no es POST, enviamos una respuesta al cliente
  echo 'Método de petición no válido.';
}
?>