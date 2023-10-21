<?php 
session_start();

//Si no existe la variable de sesión es que no se ha identificado, lo echamos a index.php
if(!isset($_SESSION['user'])){
    header('Location:index.php');
    die();
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
    <h1>Bienvenido a tu página personal <?= $_SESSION['user'] ?></h1>
    <a href="logout.php">Cerrar sesión</a>
</body>
</html>