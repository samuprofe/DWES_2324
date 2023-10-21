<?php 

class ConnexionDB{

    private $conn;

    function __construct($user, $password, $host, $database)
    {
        $this->conn = new mysqli($host,$user,$password,$database);
        if($this->conn->connect_error){
            die('Error al conectar con MySQL');
        }
    }

    function getConnexion(){
        return $this->conn;
    }


}