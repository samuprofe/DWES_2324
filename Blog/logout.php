<?php 
session_start();
session_unset();    //Borra todas las variables de sesión
setcookie('sid','',0,'/');
header('location: index.php');