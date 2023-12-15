<?php 
require 'config.php';

class ConnexionDBi{

    private static $conn;

    public static function getConnexion()
    {
        if (is_null(self::$conn)){
            self::$conn = new mysqli(MYSQL_HOST,MYSQL_USER,MYSQL_PASS,MYSQL_DB);
            if(is_null(self::$conn)){
                die("Error al conectar con la BD");
            }
        }
        else{
            return self::$conn;
        }
    }
}