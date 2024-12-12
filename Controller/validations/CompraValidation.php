<?php
  // Incluimos las tablas de la base de datos
  require_once '../../Model/Products.php';
  require_once '../../Model/User.php';
  require_once '../../Model/Carrito.php';  
  require_once '../../Model/Ventas.php';  

  session_start(); // Comienzo de la session

  // Obtenemos el ID del usuario actual desde la sesión
  $userId = $_SESSION['idUsuario'];

// Obtenemos los productos del carrito del usuario actual
$carrito = new Carrito();
$miCarrito = $carrito->getCarritoUsuario($userId);

// Si no hay productos en el carrito, redireccionamos a la página de compra
if (empty($miCarrito)) {
    header('Location: compra.php');
    exit; // Asegúrate de terminar el script después de redireccionar
}

// Creamos las ventas a partir de todos los productos del carrito
foreach ($miCarrito as $carritoObject) {

    $producto = Producto::getProductosById($carritoObject); // Obtenemos el producto como objeto
    $precioProducto = $producto->getPrecio();  
    $cantidad = $carrito->getCarritoCantidad($userId, $carritoObject); // Cantidad como número

    $cantidadProducto = $cantidad[0];

    // Creamos la venta con los valores correctos
    $venta = new Ventas(null, $userId, $cantidadProducto, $precioProducto);
    $venta->insert(); // Insertamos la venta en la base de datos

    // Borramos del carrito
    $carrito->eliminarProductoDelCarrito($userId, $carritoObject);
}

header('Location: ../../View/animation.php');
  






  