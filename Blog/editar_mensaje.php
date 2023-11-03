<?php 
require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';
require_once 'modelos/Usuario.php';
require_once 'modelos/UsuariosDAO.php';

$error ='';


//Conectamos con la bD
$connexionDB = new ConnexionDB('root','','localhost','blog');
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

        if($mensajeDAO->update($mensaje)){
            header('location: index.php');
            die();
        }
    }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $error ?>
    <form action="editar_mensaje.php?id=<?= $idMensaje ?>" method="post">
        <input type="text" name="titulo" placeholder="Titulo" value="<?=$mensaje->getTitulo()?>"><br>
        <textarea name="texto" placeholder="Texto"><?=$mensaje->getTexto()?></textarea><br>
        <select name="idUsuario">
            <?php foreach($usuarios as $usuario): ?>
                <?php if($usuario->getId() == $mensaje->getIdUsuario()):?>
                    <option value="<?= $usuario->getId() ?>" selected><?= $usuario->getEmail() ?></option>
                <?php else: ?>
                    <option value="<?= $usuario->getId() ?>"><?= $usuario->getEmail() ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>
        <input type="submit">
    </form>
</body>
</html>