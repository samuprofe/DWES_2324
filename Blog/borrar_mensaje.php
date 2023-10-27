<?php 

require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';

//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB('root','','localhost','blog');
$conn = $connexionDB->getConnexion();

//Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
$mensajesDAO = new MensajesDAO($conn);

//Obtener el mensaje
$idMensaje = htmlspecialchars($_GET['id']);
$mensajesDAO->delete($idMensaje);

header('location: index.php');