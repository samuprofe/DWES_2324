<?php 

class ControladorFavoritos{
    function insertar(){
        //Creamos la conexión utilizando la clase que hemos creado
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        $idMensaje = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $favoritosDAO = new FavoritosDAO($conn);
        $favorito = new Favorito();
        $favorito->setIdMensaje($idMensaje);
        $favorito->setIdUsuario(Sesion::getUsuario()->getId());
        if($favoritosDAO->insert($favorito)){
            $numFavoritos = $favoritosDAO->countByIdMensaje($idMensaje);
            print json_encode(['respuesta'=>'ok','numFavoritos'=>$numFavoritos]);
        }else{
            print json_encode(['respuesta'=>'error']);
        }
    }

    function borrar(){
   
        //Creamos la conexión utilizando la clase que hemos creado
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        $idMensaje = filter_var($_GET['id'],FILTER_SANITIZE_NUMBER_INT);
        $favoritosDAO = new FavoritosDAO($conn);
        if(!$favorito = $favoritosDAO->getByIdUsuarioIdMensaje(Sesion::getUsuario()->getId(),$idMensaje)){
            print json_encode(['respuesta'=>'error', 'mensaje'=>'el favorito no existe']);
            die();
        }
        
        if($favoritosDAO->delete($favorito)){
            $numFavoritos = $favoritosDAO->countByIdMensaje($idMensaje);
            print json_encode(['respuesta'=>'ok','numFavoritos'=>$numFavoritos]);
        }else{
            print json_encode(['respuesta'=>'error']);
        }
    }

}