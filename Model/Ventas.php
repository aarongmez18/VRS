<?php require_once 'VarosiDB.php';
class Ventas { 
    // Atributos
    private $id;
    private $id_usuario;
    private $cantidad;
    private $precio;
    private $fecha;

    // Constructor
    function __construct($id='', $id_usuario='', $cantidad='', $precio='') {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->cantidad = $cantidad;
        $this->precio = $precio;
        $this->fecha = date('Y-m-d'); // Fecha actual
    }

    // Getters
    public function getId() {
        return $this->id;
    }
    public function getIdUsuario() {
        return $this->id_usuario;
    }
    public function getCantidad() {
        return $this->cantidad;
    }
    public function getPrecio() {
        return $this->precio;
    }

    // Función para insertar una venta en la base de datos
    public function insert() {
        $conexion = VarosiDB::connectDB();
        $id_usuario = $this->id_usuario;
        $cantidad = $this->cantidad;
        $precio = $this->precio;
        $fecha = $this->fecha;

        $insercion = "INSERT INTO ventas (id_usuario, cantidad, precio, fecha) VALUES ('$id_usuario', '$cantidad', '$precio', '$fecha')";
        $conexion->exec($insercion);
    }

    // Función para obtener todas las ventas
    public static function obtenerVentas() {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT * FROM ventas ORDER BY id";

        $consulta = $conexion->query($seleccion);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para obtener las ventas de un usuario específico
    public static function obtenerVentasPorUsuario($id_usuario) {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, cantidad, precio FROM ventas WHERE id_usuario='$id_usuario'";

        $consulta = $conexion->query($seleccion);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para eliminar una venta por ID
    public function delete() {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM ventas WHERE id='$this->id'";
        $conexion->exec($borrado);
    }

    // Función para obtener las últimas 10 ventas
    public static function obtenerUltimasVentas() {
        $conexion = VarosiDB::connectDB();
        $query = "SELECT * FROM ventas ORDER BY id DESC LIMIT 10";
        $consulta = $conexion->query($query);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }

    // Función para obtener estadísticas de ventas
    public static function obtenerEstadisticasVentas() {
        $conexion = VarosiDB::connectDB();
        $query = "SELECT DATE(fecha) AS fecha, SUM(precio * cantidad) AS total FROM ventas GROUP BY DATE(fecha) ORDER BY fecha DESC LIMIT 7";
        $consulta = $conexion->query($query);
        return $consulta->fetchAll(PDO::FETCH_ASSOC);
    }


}
?>
