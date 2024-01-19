<?php 
require_once 'modelos/Tarea.php';
require_once 'modelos/TareasDAO.php';

$tareasDAO = new TareasDAO();
$tareas = $tareasDAO->obtenerTodasLasTareas();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css" integrity="sha512-DTOQO9RWCH3ppGqcWaEA1BIZOC6xxalwEsw9c2QQeAIftl+Vegovlnee1c9QX4TctnWMn13TZye+giMm8e2LwA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="estilos.css">
   
</head>
<body>

    <div id="tareas">
        <?php foreach ($tareas as $tarea): ?>
            <div class="tarea">
                <div class="texto"><?= $tarea->getTexto() ?></div>
                <i class="fa-solid fa-trash papelera" data-idTarea="<?= $tarea->getId()?>"></i>
                <img src="preloader.gif" class="preloaderBorrar">
            </div>
        <?php endforeach; ?>
    </div>

    <input type="text" id="nuevaTarea">
    <button id="botonNuevaTarea">Enviar</button><img src="preloader.gif" id="preloaderInsertar">

    <script src="js.js" type="text/javascript"></script>
</body>
</html>