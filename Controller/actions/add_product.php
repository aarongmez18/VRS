<?php
require_once "../../Model/Products.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    // Verificamos si el archivo fue enviado correctamente
    if (isset($_FILES['productImage']) && $_FILES['productImage']['error'] === UPLOAD_ERR_OK) {

        // Creamos una nueva instancia de Producto
        $product = new Producto();

        // Establecemos los valores del producto
        $product->setNombre($_POST['productName']);
        $product->setPrecio($_POST['productPrice']);
        $product->setDescripcion($_POST['productDescription']);

        // Obtenemos la ruta donde se almacenará la imagen
        $path = "../../View/IMG/uploaded/"; // Asegúrate de que esta carpeta exista
        $file = $_FILES['productImage']; // Obtenemos el archivo desde $_FILES
        $imageName = $file['name']; // Nombre original del archivo
        $imagePath = $path . $imageName; // Ruta final del archivo

        // Establecemos la ruta de la imagen en el producto
        $product->setImagen($imagePath);

        // Insertamos el producto en la base de datos
        try {
            // Insertamos el producto
            $product->insert();

            // Movemos el archivo cargado a la carpeta de destino
            if (move_uploaded_file($file['tmp_name'], $imagePath)) {            
                header('Location: ../../View/animation.php');
            } else {
                echo "Error al mover la imagen al directorio.";
            }

        } catch (Exception $e) {
            echo "Error al agregar el producto: " . $e->getMessage();
        }

    } else {
        echo "Error al cargar la imagen. Código de error: " . $_FILES['productImage']['error'];
    }

} else {
    // Si el método de petición no es POST, enviamos una respuesta al cliente
    echo 'Método de petición no válido.';
}
?>
