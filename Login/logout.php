<?php 
session_start();

//Borramos la variable de sesión y volvemos a index.php
unset($_SESSION['user']);
setcookie('user','',0); //Borra la cookie
header('Location: index.php');