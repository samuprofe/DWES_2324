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
        //Creamos la conexión utilizando la clase que hemos creado
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        //Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
        $mensajesDAO = new MensajesDAO($conn);

        //Obtener el mensaje
        $idMensaje = htmlspecialchars($_GET['id']);
        $mensaje = $mensajesDAO->getById($idMensaje);

        //Comprobamos que mensaje pertenece al usuario conectado
        if(Sesion::getUsuario()->getId()==$mensaje->getIdUsuario()){
            $mensajesDAO->delete($idMensaje);
        }
        else
        {
            guardarMensaje("No puedes borrar este mensaje");
        }

        header('location: index.php');
    }

    public function editar(){
        $error ='';


        //Conectamos con la bD
        $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
        $conn = $connexionDB->getConnexion();

        //Obtengo el id del mensaje que viene por GET
        $idMensaje = htmlspecialchars($_GET['id']);
        //Obtengo el mensaje de la BD
        $mensajeDAO = new MensajesDAO($conn);
        $mensaje = $mensajeDAO->getById($idMensaje);

        //Obtenemos los usuarios de la BD para el desplegable
        $usuariosDAO = new UsuariosDAO($conn);
        $usuarios = $usuariosDAO->getAll();

        //Cuando se envíe el formulario actualizo el mensaje en la BD
        if($_SERVER['REQUEST_METHOD']=='POST'){

            //Limpiamos los datos que vienen del usuario
            $titulo = htmlspecialchars($_POST['titulo']);
            $texto = htmlspecialchars($_POST['texto']);
            $idUsuario = htmlspecialchars($_POST['idUsuario']);

            //Validamos los datos
            if(empty($titulo) || empty($texto)){
                $error = "Los dos campos son obligatorios";
            }
            else{
                $mensaje->setTitulo($titulo);
                $mensaje->setTexto($texto);
                $mensaje->setIdUsuario($idUsuario);

                $mensajeDAO->update($mensaje);
                header('location: index.php');
                die();
            }

        } //if($_SERVER['REQUEST_METHOD']=='POST'){
        
            require 'app/vistas/editar_mensaje.php';
    }

    public function insertar(){
        print "Insertar";
    }
}