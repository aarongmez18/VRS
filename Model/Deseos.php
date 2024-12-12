<?php require_once 'VarosiDB.php';
class Deseos
{
    // Atributos
    private $id;
    private $id_usuario;
    private $id_producto;

    // Constructor
    function __construct($id='', $id_usuario='', $id_producto='')
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->id_producto = $id_producto;
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

    // Función insertar a la Base de datos
    public function insert()
    {
        $conexion = VarosiDB::connectDB();
        $id_usuario = $this->id_usuario;
        $id_producto = $this->id_producto;

        $insercion = "INSERT INTO deseos (id_usuario, id_producto) VALUES ('$id_usuario', '$id_producto')";
        $conexion->exec($insercion);
    }

    // Función borrar de la Base de datos
    public function delete()
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM deseos WHERE id='$this->id'";
        $conexion->exec($borrado);
    }
    public function deleteUser($id)
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM deseos WHERE id_usuario='$id'";
        $conexion->exec($borrado);
    }

    // Función guarda todos los datos de la Base de datos en un array
    public static function getDeseos()
    {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, id_usuario, id_producto FROM deseos";

        $consulta = $conexion->query($seleccion);
        $deseos = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $deseos[] = new Deseos($registro->id, $registro->id_usuario, $registro->id_producto);
        }

        return $deseos;
    }

// Función guarda un dato especifico de la Base de datos en una variable
public static function getDeseosUsuario($id)
{
    $conexion = VarosiDB::connectDB();

    $seleccion = "SELECT id_producto FROM deseos WHERE id_usuario='$id'";
    $consulta = $conexion->query($seleccion);
    $deseos = [];
    // Recorre la base de datos y lo inserta
    while ($registro = $consulta->fetchObject()) {
        $deseos[] = $registro->id_producto;
    }
    return $deseos;
}

    // Función para eliminar un producto de la lista de deseos
    public function eliminarProductoDeLaListaDeseos($userId, $productId){
    $conexion = VarosiDB::connectDB();

    $borrado = "DELETE FROM deseos WHERE id_usuario='$userId' AND id_producto='$productId'";
    $conexion->exec($borrado);
}

    // Función para verificar si un producto ya existe en la lista de deseos
public function productoExisteEnListaDeseos($id_usuario, $id_producto)
{
    $conexion = VarosiDB::connectDB();
    $seleccion = "SELECT COUNT(*) AS existe FROM deseos WHERE id_usuario='$id_usuario' AND id_producto='$id_producto'";
    $consulta = $conexion->query($seleccion);
    $conexion = $consulta->fetchObject();

    return $conexion->existe > 0;
}


// Función para agregar un producto a la lista de deseos
public function agregarProductoALaListaDeseos($id_usuario, $id_producto)
{
    if (!$this->productoExisteEnListaDeseos($id_usuario, $id_producto)) {
        $this->id_usuario = $id_usuario;
        $this->id_producto = $id_producto;
        $this->insert();
        return true;
    } else {
        return false;
    }
}
}

