<?php
require_once '../Model/Carrito.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
  // Almacenamos las variables 
  $userId = $_POST['userId'];
  $productId = $_POST['productId'];
  $valor = $_POST['value'];
  
  // Creamos una instancia de la clase Carrito
  $deseos = new Carrito();

  // Si el valor es 1 agregamos el producto a la base de datos
  if($valor == 1){
  // Verificamos si el producto ya está en el carrito
  if ($deseos->productoExisteEnCarrito($userId, $productId)) {
    // Si el producto ya está en el carrito, enviamos una respuesta al cliente
    echo 'El producto ya está en el carrito';
  } else {
    // Si el producto no está en el carrito, lo agregamos
    if ($deseos->agregarProductoAlCarrito($userId, $productId)) {
      // Si el producto se agregó correctamente, enviamos una respuesta al cliente
      echo 'Producto ID: ' . $productId . ' agregado al carrito';
    } else {
      // Si hubo un error al agregar el producto, enviamos una respuesta al cliente
      echo 'Error al agregar el producto en el carrito';
    }
  }
  }else if($valor == 2){
    // Si el valor es 2 eliminamos el producto de la base de datos
    $deseos->eliminarProductoDelCarrito($userId, $productId);
    // Enviamos respuesta al cliente
    echo 'Producto ID: ' . $productId .'eliminado de la lista de deseos.';

  }
  

  
} else {
  // Si el método de petición no es POST, enviamos una respuesta al cliente
  echo 'Método de petición no válido.';
}
?>