<?php

class MensajesDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function getById($id):Mensaje|null {
        if(!$result = $this->conn->query("SELECT * FROM mensajes WHERE id = $id"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        if($result->num_rows == 1){
            $mensaje = $result->fetch_object(Mensaje::class);
            return $mensaje;
        }
        else{
            return null;
        }

    }

}
?>
