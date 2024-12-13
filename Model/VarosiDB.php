<?php
abstract class VarosiDB
{
    private static $server = "localhost"; // Nombre del host
    private static $db = "varosi";        // Nombre de la base de datos
    private static $user = "root";            // Usuario MySQL
    private static $password = "";  
    // Conexión a la base de datos
    public static function connectDB()
    {

        try {
            $connection = new PDO("mysql:host=" . self::$server . ";dbname=" . self::$db .
                ";charset=utf8", self::$user, self::$password);
        } catch (PDOException $e) {
            echo "No se ha podido establecer conexión con el servidor de bases de datos.<br>";
            die("Error: " . $e->getMessage());
        }
        return $connection;
    }
}

