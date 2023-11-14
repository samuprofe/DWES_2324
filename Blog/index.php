<?php 
session_start();
require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';
require_once 'modelos/Usuario.php';
require_once 'modelos/UsuariosDAO.php';
require_once 'funciones.php';

//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB('root','','localhost','blog');
$conn = $connexionDB->getConnexion();

//Si existe la cookie y no ha iniciado sesión, le iniciamos sesión de forma automática
if( !isset($_SESSION['email']) && isset($_COOKIE['sid'])){
    //Nos conectamos para obtener el id y la foto del usuario
    $usuariosDAO = new UsuariosDAO($conn);
    //$usuario = $usuariosDAO->getByEmail($_COOKIE['email']);
    if($usuario = $usuariosDAO->getBySid($_COOKIE['sid'])){
        //Inicio sesión
        $_SESSION['email']=$usuario->getEmail();
        $_SESSION['id']=$usuario->getId();
        $_SESSION['foto']=$usuario->getFoto();
    }
    
}



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
    .nuevoMensaje{
        margin: 30px auto;
        padding:5px;
        border:1px solid black;
        width: 80%;
        background-color: #00f;        
        color:white;
        display: block;
        text-align: center;
        text-decoration: none;
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
    .icono_editar{
        top: 5px;
        right: 25px;
        position: absolute;
    }
    .color_gris:hover{
        color:black;
    }
    .color_gris{
        color:#aaa;
    }

    .error{
        color:red;
        display: block;
        padding: 5px;
        margin: auto;
        width: 80%;
        border: 1px solid red;
        text-align: center;
        margin-top: 20px;

    }
    .fotoUsuario{
        height: 50px;;
    }
    header{
        margin: 0px auto;
        padding:5px;
        border:1px solid black;
        width: 80%;
        position: relative;
        height: 140px;
    }
    .tituloPagina{
        text-align: center;;
    }
    </style>
    </style>
</head>
<body>
<header>
    <h1 class="tituloPagina">Todos los mensajes</h1>
    <?php if(isset($_SESSION['email'])): ?>
        <img src="fotosUsuarios/<?= $_SESSION['foto']?>" class="fotoUsuario">
        <span class="emailUsuario"><?= $_SESSION['email'] ?></span>
        <a href="logout.php">cerrar sesión</a>
    <?php else: ?>
        <form action="login.php" method="post">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="login">
            <a href="registrar.php">registrar</a>
        </form>
    <?php endif; ?>
</header>

<main>
    <?php 
        imprimirMensaje();
    ?>
    <?php foreach ($mensajes as $mensaje): ?>
        <div class="mensaje">
           <h4 class="titulo">
            <a href="ver_mensaje.php?id=<?=$mensaje->getId()?>"><?= $mensaje->getTitulo() ?></a>
            </h4>
            <?php if(isset($_SESSION['email']) && $_SESSION['id']==$mensaje->getIdUsuario()): ?>
                <span class="icono_borrar"><a href="borrar_mensaje.php?id=<?=$mensaje->getId()?>"><i class="fa-solid fa-trash color_gris"></i></a></span>
                <span class="icono_editar"><a href="editar_mensaje.php?id=<?=$mensaje->getId()?>"><i class="fa-solid fa-pen-to-square color_gris" "></i></a></span>
            <?php endif; ?>
           <p class="texto"><?= $mensaje->getTexto() ?></p>
           <img src="fotosUsuarios/<?= $mensaje->getUsuario()->getFoto() ?>" height="100px">
           <span><?= $mensaje->getUsuario()->getEmail() ?></span>
        </div>
    <?php endforeach; ?>
    <?php if(isset($_SESSION['email'])): ?>
        <a href="insertar_mensaje.php" class="nuevoMensaje">Nuevo mensaje</a>
    <?php endif; ?>
</main>    
<script>
setTimeout(function(){document.getElementById('mensajeError').style.display='none'},5000);
</script>
</body>
</html>
