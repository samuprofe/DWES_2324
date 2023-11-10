<?php 
session_start();
require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Usuario.php';
require_once 'modelos/UsuariosDAO.php';
require_once 'modelos/config.php';

//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB(MYSQL_USER,MYSQL_PASS,MYSQL_HOST,MYSQL_DB);
$conn = $connexionDB->getConnexion();

//limpiamos los datos que vienen del usuario
$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

//Validamos el usuario
$usuariosDAO = new UsuariosDAO($conn);
if($usuario = $usuariosDAO->getByEmail($email)){
    if(password_verify($password, $usuario->getPassword()))
    {
        //email y password correctos
        //Iniciar sesión y redirigir a index.php
        $_SESSION['email'] = $usuario->getEmail();
        $_SESSION['foto'] = $usuario->getFoto();
        header('location: index.php');
        die();
    }
}
//email o password incorrectos, redirigir a index.php
$_SESSION['error']="Email o password incorrectos";
header('location: index.php');