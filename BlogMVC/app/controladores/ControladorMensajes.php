<?php 

class ControladorMensajes{
    public function ver(){
        //Creamos la conexión utilizando la clase que hemos creado
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        //Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
        $mensajesDAO = new MensajesDAO($conn);

        //Obtener el mensaje
        $idMensaje = htmlspecialchars($_GET['id']);
        $mensaje = $mensajesDAO->getById($idMensaje);

        require 'app/vistas/ver_mensaje.php';
    }

    public function inicio(){

        //Creamos la conexión utilizando la clase que hemos creado
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        //Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
        $mensajeDAO = new MensajesDAO($conn);
        $mensajes = $mensajeDAO->getAll();

        //Incluyo la vista
        require 'app/vistas/inicio.php';
    }

    public function borrar(){
        print "Borrar";
    }

    public function editar(){
        print "Editar";
    }

    public function insertar(){
        print "Insertar";
    }
}