<?php require_once 'VarosiDB.php';

class Producto
{
    // Atributos
    private $id;
    private $nombre;
    private $descripcion;
    private $imagen;
    private $precio;

    // Constructor
    function __construct($id='', $nombre='', $descripcion='', $imagen='', $precio='')
    {
        $this->id = $id;
        $this->nombre = $nombre;
        $this->descripcion = $descripcion;
        $this->imagen = $imagen;
        $this->precio = $precio;
    }

    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getNombre()
    {
        return $this->nombre;
    }
    public function getDescripcion()
    {
        return $this->descripcion;
    }
    public function getImagen()
    {
        return $this->imagen;
    }
    public function getPrecio()
    {
        return $this->precio;
    }

    // Setters
    public function setId($id)
    {
        $this->id = $id;
    }
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;
    }
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;
    }
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;
    }
    public function setPrecio($precio)
    {
        $this->precio = $precio;
    }

    // Función insertar a la Base de datos
    public function insert()
    {
        $conexion = VarosiDB::connectDB();
        $nombre = $this->nombre;
        $descripcion = $this->descripcion;
        $imagen = $this->imagen;
        $precio = $this->precio;

        $insercion = "INSERT INTO products (nombre, descripcion, imagen, precio) VALUES ('$nombre', '$descripcion', '$imagen', '$precio')";
        $conexion->exec($insercion);
    }

    // Función borrar de la Base de datos
    public function delete()
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM products WHERE id='$this->id'";
        $conexion->exec($borrado);
    }

    // Función guarda todos los datos de la Base de datos en un array
    public static function getProductos()
    {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, imagen, precio FROM products";
    
        $consulta = $conexion->query($seleccion);
        $productos = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Producto($registro->id, $registro->nombre, $registro->descripcion, $registro->imagen, $registro->precio);
        }

        // Devuelve el array con los productos
        return $productos;
    }

    // Función guarda un dato especifico de la Base de datos en una variable
    public static function getProductoById($id)
    {
        $conexion = VarosiDB::connectDB();

        $seleccion = "SELECT id, nombre, descripcion, imagen, precio FROM products WHERE id='$id'";
        $consulta = $conexion->query($seleccion);

        $registro = $consulta->fetchObject();
        // Guarda los elementos en una variable
        $producto = new Producto($registro->id, $registro->nombre, $registro->descripcion, $registro->imagen, $registro->precio);
        return $producto;
    }

    //Función recoge 6 productos aleatorios de la base de datos en un array
    public static function getProductosAleatorios(){
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, nombre, descripcion, imagen, precio FROM products ORDER BY RAND() LIMIT 4";
        $consulta = $conexion->query($seleccion);

        $productos = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $productos[] = new Producto($registro->id, $registro->nombre, $registro->descripcion, $registro->imagen, $registro->precio);
        }
        // Devuelve el array con los productos
        return $productos;
    }


        // Función guarda todos los datos de la Base de datos en un array
        public static function getProductosById($id)
        {
            $conexion = VarosiDB::connectDB();
            $seleccion = "SELECT id, nombre, descripcion, imagen, precio FROM products WHERE id='$id'";
            
            $consulta = $conexion->query($seleccion);
            
            if ($registro = $consulta->fetchObject()) {
                return new Producto($registro->id, $registro->nombre, $registro->descripcion, $registro->imagen, $registro->precio);
            } else {
                return false;  // Retorna false si no se encuentra el producto
            }
        }
        

    // Método que devuelve un array con los datos del producto
    public function toArray() {
        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'descripcion' => $this->descripcion,
            'imagen' => $this->imagen,
            'precio' => $this->precio
        ];
    }
}
?>