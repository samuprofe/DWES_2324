<?php 

class ControladorFavoritos{
    function insertar(){
        //Recibimos por GET  el idMensaje y devolvemos un json con el numero de mensajes
        
        //Creamos la conexión utilizando la clase que hemos creado
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        $idMensaje = filter_var($_GET['idMensaje'],FILTER_SANITIZE_NUMBER_INT);
        $favorito = new Favorito();
        $favoritosDAO = new FavoritosDAO($conn);
        $favorito->setIdUsuario(Sesion::getUsuario()->getId());
        $favorito->setIdMensaje($idMensaje);
        if($favoritosDAO->insert($favorito)){
            print json_encode(['respuesta'=>'ok']);
        }else{
            print json_encode(['respuesta'=>'error']);
        }

        

    }

    function borrar(){
        //Recibimos por GET el idMensaje y devolvemos un json con respuesta=ok si todo va bien

    }

}