<?php require_once 'VarosiDB.php';

class User
{
    //Atributos
    private $id;
    private $usuario;
    private $correo;
    private $contrasena;

    // Constructor
    function __construct($id='', $usuario='',$correo='', $contrasena='')
    {
        $this->id = $id;
        $this->usuario = $usuario;
        $this->correo = $correo;
        $this->contrasena = $contrasena;
    }


    // Getters
    public function getId()
    {
        return $this->id;
    }
    public function getUsuario()
    {
        return $this->usuario;
    }

    public function getCorreo()
    {
        return $this->correo;
    }
    public function getContrasena()
    {
        return $this->contrasena;
    }

    // Función insertar a la Base de datos
    public function insert()
    {
        $conexion = VarosiDB::connectDB();
        // $fecha = $this->crearFecha();
        $usuario = $this->usuario; 
        $correo = $this->correo;
        $contrasena = $this->contrasena;

        $insercion = "INSERT INTO users (usuario, correo, contrasena) VALUES ('$usuario', '$correo', '$contrasena')";
        $conexion->exec($insercion);
    }

    // Función borrar de la Base de datos
    public function delete()
    {
        $conexion = VarosiDB::connectDB();
        $borrado = "DELETE FROM users WHERE id='$this->id'";
        $conexion->exec($borrado);
    }

    // Función guarda todos los datos de la Base de datos en un array
    public static function getUsers()
    {
        $conexion = VarosiDB::connectDB();
        $seleccion = "SELECT id, usuario, correo, contrasena FROM users";

        $consulta = $conexion->query($seleccion);
        $users = [];
        // Recorre la base de datos y lo inserta
        while ($registro = $consulta->fetchObject()) {
            $users[] = new User($registro->id, $registro->usuario, $registro->correo, $registro->contrasena);
        }

        return $users;
    }


    // Función guarda un dato especifico de la Base de datos en una variable
    public static function getUsersById($id)
    {
        $conexion = VarosiDB::connectDB();

        $seleccion = "SELECT id, usuario, correo, contrasena FROM users WHERE id='$id'";
        $consulta = $conexion->query($seleccion);

        $registro = $consulta->fetchObject();
        // Guarda los elementos en una variable
        $user = new User($registro->id, $registro->usuario, $registro->correo, $registro->contrasena);
        return $user;
    }

    

    public static function getEmails(){
        
        $conexion = VarosiDB::connectDB();
    
        $seleccion = "SELECT correo FROM users";
        $consulta = $conexion->query($seleccion);
    
        $emails = [];
        while ($registro = $consulta->fetchObject()) {
            $emails[] = $registro->correo;
        }
    
        return $emails;
    }

    public static function getUsernames(){
        
        $conexion = VarosiDB::connectDB();
    
        $seleccion = "SELECT usuario FROM users";
        $consulta = $conexion->query($seleccion);
    
        $usuarios = [];
        while ($registro = $consulta->fetchObject()) {
            $usuarios[] = $registro->usuario;
        }
    
        return $usuarios;
    }

    public static function getUserByUsernameAndPassword($user, $password){
        
        $conexion = VarosiDB::connectDB();
        
        $seleccion = "SELECT id, usuario, correo, contrasena FROM users WHERE usuario='$user' AND contrasena='$password'";
        $consulta = $conexion->query($seleccion);
        
        $registro = $consulta->fetchObject();

        if($registro != null){
            return new User($registro->id, $registro->usuario, $registro->correo, $registro->contrasena);
        } else {
            return null;
        }
    }

    // Funcion para rescatar al usuario 'invitado'
    public static function getUsuarioInvitado(){
        $conexion = VarosiDB::connectDB();

        $seleccion = "SELECT id, usuario, correo, contrasena FROM users WHERE usuario='Invitado' AND contrasena='invitado'";
        $consulta = $conexion->query($seleccion);

        $registro = $consulta->fetchObject();
        return new User($registro->id, $registro->usuario, $registro->correo, $registro->contrasena);
    }
}

