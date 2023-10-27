<?php 
require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';

//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB('root','','localhost','blog');
$conn = $connexionDB->getConnexion();

//Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
$mensajeDAO = new MensajesDAO($conn);
$mensajes = $mensajeDAO->getAll();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <style>
    .mensaje{
        margin: 30px auto;
        padding:5px;
        border:1px solid black;
        width: 80%;
        position: relative;
    }
    .titulo{
        font-size: 2em;
    }
    .texto{
        font-size: 1.5em;
    }
    .icono_borrar{
        top: 5px;
        right: 5px;
        position: absolute;
    }
    .color_gris:hover{
        color:black;
    }
    .color_gris{
        color:#aaa;
    }

    </style>
    </style>
</head>
<body>
<header>
    <h1>Todos los mensajes</h1>
</header>

<main>
    <?php foreach ($mensajes as $mensaje): ?>
        <div class="mensaje">
           <h4 class="titulo">
            <a href="ver_mensaje.php?id=<?=$mensaje->getId()?>"><?= $mensaje->getTitulo() ?></a>
            <span class="icono_borrar"><a href="borrar_mensaje.php?id=<?=$mensaje->getId()?>"><i class="fa-solid fa-trash color_gris"></i></a></span>
            </h4>
           <p class="texto"><?= $mensaje->getTexto() ?></p>
        </div>
    <?php endforeach; ?>

    <a href="insertar_mensaje.php">Nuevo mensaje</a>
</main>    
</body>
</html>
