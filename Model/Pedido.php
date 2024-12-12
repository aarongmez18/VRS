<?php require_once 'VarosiDB.php';

class Pedido
{
    //Atributos
    private $id;
    private $id_usuario;
    private $fecha;
    private $total;
    private $estado;

    // Constructor
    function __construct($id='', $id_usuario='', $fecha='', $total='', $estado='')
    {
        $this->id = $id;
        $this->id_usuario = $id_usuario;
        $this->fecha = $fecha;
        $this->total = $total;
        $this->estado = $estado;
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
    public function getFecha()
    {
        return $this->fecha;
    }
    public function getTotal()
    {
        return $this->total;
    }
    public function getEstado()
    {
        return $this->estado;
    }

    // Función insertar a la Base de datos
    public function insert()
    {
        $conexion = VarosiDB::connectDB();
        $id_usuario = $this->id_usuario; 
        // Genera la fecha automaticamente
        $this->fecha = date('Y-m-d');
        $total = $this->total;
        $estado = $this->estado;

        $insercion = "INSERT INTO pedido (id_usuario, fecha, total, estado) VALUES ('$id_usuario', '$this->fecha', '$total', '$estado')";
        $conexion->exec($insercion);
    }

    // Función borrar de la Base de datos
    public function delete()
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM pedido WHERE id='$this->id'";
        $conexion->exec($borrado);
    }

    // Función guarda todos los datos de la Base de datos en un array
    public static function getPedidos()
    {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, id_usuario, fecha, total, estado FROM pedido";

        $consulta = $conexion->query($seleccion);
        $pedidos = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $pedidos[] = new Pedido($registro->id, $registro->id_usuario, $registro->fecha, $registro->total, $registro->estado);
        }

        return $pedidos;
    }

    // Función guarda un dato especifico de la Base de datos en una variable
    public static function getPedidoById($id)
    {
        $conexion = VarosiDB::connectDB();

        $seleccion = "SELECT id, id_usuario, fecha, total, estado FROM pedido WHERE id='$id'";
        $consulta = $conexion->query($seleccion);

        $registro = $consulta->fetchObject();
        // Guarda los elementos en una variable
        $pedido = new Pedido($registro->id, $registro->id_usuario, $registro->fecha, $registro->total, $registro->estado);
        return $pedido;
    }

}