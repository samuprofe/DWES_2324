<?php 

require_once 'app/config/config.php';
require_once 'app/modelos/ConnexionDB.php';
require_once 'app/modelos/Mensaje.php';
require_once 'app/modelos/MensajesDAO.php';
require_once 'app/modelos/Usuario.php';
require_once 'app/modelos/UsuariosDAO.php';
require_once 'app/controladores/ControladorMensajes.php';
require_once 'app/controladores/ControladorUsuarios.php';
require_once 'app/utils/funciones.php';
require_once 'app/modelos/Sesion.php';

//Uso de variables de sesión
session_start();

//Mapa de enrutamiento
$mapa = array(
    'inicio'=>array("controlador"=>'ControladorMensajes','metodo'=>'inicio'),
    'ver_mensaje'=>array("controlador"=>'ControladorMensajes','metodo'=>'ver'),
    'insertar_mensaje'=>array('controlador'=>'ControladorMensajes','metodo'=>'insertar'),
    'borrar_mensaje'=>array('controlador'=>'ControladorMensajes','metodo'=>'borrar'),
    'editar_mensaje'=>array('controlador'=>'ControladorMensajes','metodo'=>'editar'),
    'login'=>array('controlador'=>'ControladorUsuarios', 'metodo'=>'login'),
    'logout'=>array('controlador'=>'ControladorUsuarios', 'metodo'=>'logout'),
    'registrar'=>array('controlador'=>'ControladorUsuarios', 'metodo'=>'registrar')
);

//Parseo de la ruta
if(isset($_GET['accion'])){ //Compruebo si me han pasado una acción concreta, sino pongo la accción por defecto inicio
    if(isset($mapa[$_GET['accion']])){  //Compruebo si la accción existe en el mapa, sino muestro error 404
        $accion = $_GET['accion']; 
    }
    else{
        //La acción no existe
        header('Status: 404 Not found');
        echo 'Página no encontrada';
        die();
    }
}else{
    $accion='inicio';   //Acción por defecto
}

//$acción ya tiene la acción a ejecutar, cogemos el controlador y metodo a ejecutar del mapa
$controlador = $mapa[$accion]['controlador'];
$metodo = $mapa[$accion]['metodo'];

//Ejecutamos el método de la clase controlador
$objeto = new $controlador();
$objeto->$metodo();