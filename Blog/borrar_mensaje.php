<?php 
session_start();

require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';
require_once 'funciones.php';
require_once 'modelos/config.php';

//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
$conn = $connexionDB->getConnexion();

//Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
$mensajesDAO = new MensajesDAO($conn);

//Obtener el mensaje
$idMensaje = htmlspecialchars($_GET['id']);
$mensaje = $mensajesDAO->getById($idMensaje);

//Comprobamos que mensaje pertenece al usuario conectado
if($_SESSION['id']==$mensaje->getIdUsuario()){
    $mensajesDAO->delete($idMensaje);
}
else
{
    guardarMensaje("No puedes borrar este mensaje");
}

header('location: index.php');