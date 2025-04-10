<?php require_once 'VarosiDB.php'; 

class Carrito
{
    // Atributos
    private $id;
    private $id_usuario;
    private $id_producto;
    private $cantidad; 

    // Constructor
    function __construct($id='', $id_usuario='', $id_producto='', $cantidad=1)
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_producto = $id_producto;
        $this->cantidad = $cantidad; 
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getIdUsuario()
    {
        return $this->id_usuario;
    }
    public function getIdProducto()
    {
        return $this->id_producto;
    }
    public function getCantidad()
    {
        return $this->cantidad;
    }

    // Función para insertar en la Base de datos
    public function insert()
    {
        $conexion = VarosiDB::connectDB();
        $id_usuario = $this->id_usuario;
        $id_producto = $this->id_producto;
        $cantidad = $this->cantidad;

        $insercion = "INSERT INTO carrito (id_usuario, id_producto, cantidad) VALUES ('$id_usuario', '$id_producto', '$cantidad')";
        $conexion->exec($insercion);
    }

    // Función para actualizar la cantidad de un producto en el carrito
    public function actualizarCantidad($userId, $productId, $nuevaCantidad)
    {
        $conexion = VarosiDB::connectDB();
        $actualizacion = "UPDATE carrito SET cantidad='$nuevaCantidad' WHERE id_usuario='$userId' AND id_producto='$productId'";
        $conexion->exec($actualizacion);
    }

    // Función para borrar de la Base de datos
    public function delete()
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM carrito WHERE id='$this->id'";
        $conexion->exec($borrado);
    }

    public function deleteUser($id)
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM carrito WHERE id_usuario='$id'";
        $conexion->exec($borrado);
    }

    // Función para obtener todos los elementos del carrito
    public static function getCarrito()
    {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, id_usuario, id_producto, cantidad FROM carrito";

        $consulta = $conexion->query($seleccion);
        $carrito = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $carrito[] = new Carrito($registro->id, $registro->id_usuario, $registro->id_producto, $registro->cantidad);
        }

        return $carrito;
    }

    // Función para obtener productos específicos del carrito de un usuario
    public static function getCarritoUsuario($id)
    {
        $conexion = VarosiDB::connectDB();

        $seleccion = "SELECT id_producto FROM carrito WHERE id_usuario='$id'";
        $consulta = $conexion->query($seleccion);
        $carrito = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $carrito[] =  $registro->id_producto;
        }
        return $carrito;
    }
        // Función para obtener productos específicos del carrito de un usuario
        public static function getCarritoCantidad($id,$id_producto)
        {
            $conexion = VarosiDB::connectDB();
    
            $seleccion = "SELECT cantidad FROM carrito WHERE id_usuario='$id' AND id_producto='$id_producto'";
            $consulta = $conexion->query($seleccion);
            $carrito = [];
            // Recorre la base de datos y lo inserta
            while ($registro = $consulta->fetchObject()) {
                $carrito[] =  $registro->cantidad;
            }
            return $carrito;
        }

    // Función para eliminar un producto del carrito
    public function eliminarProductoDelCarrito($userId, $productId)
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM carrito WHERE id_usuario='$userId' AND id_producto='$productId'";
        $conexion->exec($borrado);
    }

    // Función para verificar si un producto ya existe en el carrito
    public function productoExisteEnCarrito($id_usuario, $id_producto)
    {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT COUNT(*) AS existe FROM carrito WHERE id_usuario='$id_usuario' AND id_producto='$id_producto'";
        $consulta = $conexion->query($seleccion);
        $conexion = $consulta->fetchObject();

        return $conexion->existe > 0;
    }

    // Función para agregar un producto al carrito
    public function agregarProductoAlCarrito($id_usuario, $id_producto, $cantidad=1)
    {
        if (!$this->productoExisteEnCarrito($id_usuario, $id_producto)) {
            $this->id_usuario = $id_usuario;
            $this->id_producto = $id_producto;
            $this->cantidad = $cantidad;
            $this->insert();
            return true;
        } else {
            $this->actualizarCantidad($id_usuario, $id_producto, $this->cantidad + $cantidad); // Actualiza la cantidad si ya existe
            return false;
        }
    }
// Función para disminuir la cantidad 
public function disminuirCantidad($id_usuario, $id_producto) {
    $conexion = VarosiDB::connectDB();
    // Verifica la cantidad actual
    $seleccion = "SELECT cantidad FROM carrito WHERE id_usuario='$id_usuario' AND id_producto='$id_producto'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();

    if ($registro) {
        $nuevaCantidad = max(1, $registro->cantidad - 1); // Evita que baje a menos de 1
        $actualizaCantidad = "UPDATE carrito SET cantidad='$nuevaCantidad' WHERE id_usuario='$id_usuario' AND id_producto='$id_producto'";
        $conexion->query($actualizaCantidad);
        return $nuevaCantidad;
    }
    return 1; // Retorna 1 si no existe el producto
}

public function aumentarCantidad($id_usuario, $id_producto) {
    $conexion = VarosiDB::connectDB();
    // Verifica la cantidad actual
    $seleccion = "SELECT cantidad FROM carrito WHERE id_usuario='$id_usuario' AND id_producto='$id_producto'";
    $consulta = $conexion->query($seleccion);
    $registro = $consulta->fetchObject();

    if ($registro) {
        $nuevaCantidad = $registro->cantidad + 1; // Aumenta la cantidad
        $actualizaCantidad = "UPDATE carrito SET cantidad='$nuevaCantidad' WHERE id_usuario='$id_usuario' AND id_producto='$id_producto'";
        $conexion->query($actualizaCantidad);
        return $nuevaCantidad;
    }
    return 1; // Si no existe, crea una nueva entrada con cantidad 1
}




}
?>
