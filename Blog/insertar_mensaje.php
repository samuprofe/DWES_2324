<?php 
require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';

$error ='';

//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB('root','','localhost','blog');
$conn = $connexionDB->getConnexion();

$usuariosDAO = new UsuariosDAO();
$usuarios = $usuariosDAO->getAll();


if($_SERVER['REQUEST_METHOD']=='POST'){

    //Limpiamos los datos que vienen del usuario
    $titulo = htmlspecialchars($_POST['titulo']);
    $texto =  htmlspecialchars($_POST['texto']);

    //Validamos los datos
    if(empty($titulo) || empty($texto)){
        $error = "Los dos campos son obligatorios";
    }
    else{
        //Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
        $mensajesDAO = new MensajesDAO($conn);
        $mensaje = new Mensaje();
        $mensaje->setTitulo($titulo);
        $mensaje->setTexto($texto);
        $mensaje->setIdUsuario(1);
        $mensajesDAO->insert($mensaje);
        header('location: index.php');
        die();
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
    <form action="insertar_mensaje.php" method="post">
        <input type="text" name="titulo" placeholder="Titulo"><br>
        <textarea name="texto" placeholder="Texto"></textarea><br>
        <select>
            <?php foreach($usuarios as $usuario): ?>
                <option ><?= $usuario->getEmail() ?></option>
            <?php endforeach; ?>
        </select>
        <input type="submit">
    </form>
</body>
</html>