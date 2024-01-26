<?php 

class FavoritosDAO {
    private mysqli $conn;

    public function __construct($conn) {
        $this->conn = $conn;
    }

    public function insert($favorito){
        if(!$stmt = $this->conn->prepare("INSERT INTO favoritos (idMensaje, idUsuario) VALUES (?,?)")){
            die("Error al preparar la consulta insert: " . $this->conn->error );
        }
        $idMensaje = $favorito->getIdMensaje();
        $idUsuario = $favorito->getIdUsuario();
        $stmt->bind_param('ii',$idMensaje, $idUsuario);
        if($stmt->execute()){
            $favorito->setId($stmt->insert_id);
            return $stmt->insert_id;
        }
        else{
            return false;
        }
    }

    /**
     * 
     */
    public function delete($favorito){
        if(!$stmt = $this->conn->prepare("DELETE FROM favoritos WHERE id = ?")){
            die("Error al preparar la consulta delete: " . $this->conn->error );
        }
        $id = $favorito->getId();
        $stmt->bind_param('i',$id);
        $stmt->execute();
        if($stmt->affected_rows >=1 ){
            return true;
        }
        else{
            return false;
        }
    }

    public function countByIdMensaje($idMensaje){
        if(!$stmt = $this->conn->prepare("SELECT count(*) as NumFavoritos FROM favoritos WHERE idMensaje = ?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('i',$idMensaje);
        $stmt->execute();
        $result = $stmt->get_result();
        $fila = $result->fetch_assoc();
        return $fila['NumFavoritos'];
    }

    /**
     * Función que comprueba si existe un favorito con idUsuario y idMensaje
     * Devuelve true si existe y false si no existe
     */
    public function existByIdUsuarioIdMensaje($idUsuario, $idMensaje){
        if(!$stmt = $this->conn->prepare("SELECT * FROM favoritos WHERE idMensaje = ? and idUsuario=?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('ii',$idMensaje, $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        if($result->num_rows>=1){
            return true;
        }else{
            return false;
        }
    }
    public function getByIdUsuarioIdMensaje($idUsuario, $idMensaje){
        if(!$stmt = $this->conn->prepare("SELECT * FROM favoritos WHERE idMensaje = ? and idUsuario=?")){
            die("Error al preparar la consulta select count: " . $this->conn->error );
        }
        $stmt->bind_param('ii',$idMensaje, $idUsuario);
        $stmt->execute();
        $result = $stmt->get_result();
        
        if($favorito = $result->fetch_object(Favorito::class)){
            return $favorito;
        }
        else{
            return false;
        }
        
    }    
}

