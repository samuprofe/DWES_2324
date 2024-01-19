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



