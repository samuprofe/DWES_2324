<?php

class MensajesDAO {
    private $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    
    public function getById($id):Mensaje|null {
        //$this->conn->prepare() devuleve un objeto de la clase mysqli_stmt
        if(!$stmt = $this->conn->prepare("SELECT * FROM mensajes WHERE id = ?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        //Asociar las variables a las interrogaciones(parámetros)
        $stmt->bind_param('i',$id);
        //Ejecutamos la SQL
        $stmt->execute();
        //Obtener el objeto mysql_result
        $result = $stmt->get_result();

        //Si ha encontrado algún resultado devolvemos un objeto de la clase Mensaje, sino null
        if($result->num_rows == 1){
            $mensaje = $result->fetch_object(Mensaje::class);
            return $mensaje;
        }
        else{
            return null;
        }
    }

    /**
     * Obtiene todos los mensajes de la tabla mensajes
     */
    public function getAll():array {
        if(!$stmt = $this->conn->prepare("SELECT * FROM mensajes"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        //Ejecutamos la SQL
        $stmt->execute();
        //Obtener el objeto mysql_result
        $result = $stmt->get_result();

        $array_mensajes = array();
        
        while($mensaje = $result->fetch_object(Mensaje::class)){
            $array_mensajes[] = $mensaje;
        }
        return $array_mensajes;
    }


    /**
     * borra el mensaje de la tabla mensajes del id pasado por parámetro
     * @return true si ha borrado el mensaje y false si no lo ha borrado (por que no existia)
     */
    function delete($id):bool{

        if(!$stmt = $this->conn->prepare("DELETE FROM mensajes WHERE id = ?"))
        {
            echo "Error en la SQL: " . $this->conn->error;
        }
        //Asociar las variables a las interrogaciones(parámetros)
        $stmt->bind_param('i',$id);
        //Ejecutamos la SQL
        $stmt->execute();
        //Comprobamos si ha borrado algún registro o no
        if($stmt->affected_rows==1){
            return true;
        }
        else{
            return false;
        }
        
    }
}
?>
