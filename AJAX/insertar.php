<?php 
require_once 'modelos/Tarea.php';
require_once 'modelos/TareasDAO.php';

$texto = htmlentities($_POST['texto']);

$tareasDAO = new TareasDAO();
$tarea = $tareasDAO->insertarTarea($texto);

print $tarea->toJSON();

//Simulamos que el servidor tarda 1sg para probar el preloader
sleep(1);

