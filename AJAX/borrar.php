<?php 
require_once 'modelos/Tarea.php';
require_once 'modelos/TareasDAO.php';

$idTarea = htmlentities($_GET['id']);

$tareasDAO = new TareasDAO();
if($tarea = $tareasDAO->borrarTarea($idTarea)){
    print json_encode(['respuesta'=>'ok']);
}else{
    print json_encode(['respuesta'=>'error', 'mensaje'=>'Tarea no encontrada']);
}

//paramos la ejecución 1sg para simular que el servidor tarda 1sg en responder
sleep(1);