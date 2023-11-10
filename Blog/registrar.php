<?php 
require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Usuario.php';
require_once 'modelos/UsuariosDAO.php';
require_once 'modelos/config.php';
require_once 'funciones.php';

$error='';

if($_SERVER['REQUEST_METHOD']=='POST'){

    //Limpiamos los datos
    $email = htmlentities($_POST['email']);
    $password = htmlentities($_POST['password']);
    $foto = '';

    //Validación 

    //Conectamos con la BD
    $connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
    $conn = $connexionDB->getConnexion();

    //Compruebo que no haya un usuario registrado con el mismo email
    $usuariosDAO = new UsuariosDAO($conn);
    if($usuariosDAO->getByEmail($email) != null){
        $error = "Ya hay un usuario con ese email";
    }
    else{

        //Copiamos la foto al disco
        if($_FILES['foto']['type'] != 'image/jpeg' &&
        $_FILES['foto']['type'] != 'image/webp' &&
        $_FILES['foto']['type'] != 'image/png')
        {
            $error="la foto no tiene el formato admitido, debe ser jpg o webp";
        }
        else{
            //Calculamos un hash para el nombre del archivo
            $foto = generarNombreArchivo($_FILES['foto']['name']);

            //Si existe un archivo con ese nombre volvemos a calcular el hash
            while(file_exists("fotosUsuarios/$foto")){
                $foto = generarNombreArchivo($_FILES['foto']['name']);
            }
            
            if(!move_uploaded_file($_FILES['foto']['tmp_name'], "fotosUsuarios/$foto")){
                die("Error al copiar la foto a la carpeta fotosUsuarios");
            }
        }
        

        if($error == '')    //Si no hay error
        {
            //Insertamos en la BD
            
            $usuario = new Usuario();
            $usuario->setEmail($email);
            //encriptamos el password
            $passwordCifrado = password_hash($password,PASSWORD_DEFAULT);
            $usuario->setPassword($passwordCifrado);
            $usuario->setFoto($foto);
            $usuario->setSid(sha1(rand()+time()), true);

            if($usuariosDAO->insert($usuario)){
                header("location: index.php");
                die();
            }else{
                $error = "No se ha podido insertar el usuario";
            }
        }
    }
    
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Registro</h1>
    <?= $error ?>
    <form action="registrar.php" method="post" enctype="multipart/form-data">
        <input type="email" name="email"><br>
        <input type="password" name="password"><br>
        <input type="file" name="foto" accept="image/jpeg, image/gif, image/webp, image/png"><br>
        <input type="submit" value="registrar">
        <a href="index.php">volver</a>
    </form>
</body>
</html>