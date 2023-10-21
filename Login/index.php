<?php 
session_start();

if(isset($_COOKIE['user'])){    //Si existe la cookie iniciamos sesión de forma automática
    $_SESSION['user']=$_COOKIE['user'];     //Iniciamos sesión con el usuario de la cookie
    header('Location:pagina_personal.php');
    die();
}


//Inicializo variables
$email=$password=$mensaje_error='';

if($_SERVER['REQUEST_METHOD']=='POST'){
    //Recojo datos del formulario
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));
    
    //Validación
    if($email=='pepe@gmail.com' && $password=='1234'){
        $_SESSION['user']='Pepe';   //Creamos la variable de sesión que le permite ver las páginas privadas
        setcookie('user','Pepe',time()+60*60*24);   //Creamos una cookie para identificarnos de forma automática cuando cerremos el navegador
        header('Location:pagina_personal.php');
        die();
    }
    else{
        $mensaje_error = "Usuario no encontrado";
    }
}
?><!DOCTYPE html>
<html lang="en">
<head>
    <style>
        .error{
            color:red;
            width: 80%;
            margin:20px auto;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
    <h2 class="error"><?= $mensaje_error ?></h2>
    
    <form action="index.php" method="post">
        <input type="email" name="email" placeholder="Email" value="<?= $email?>" >
        <input type="password" name="password" placeholder="Password" value="<?= $password ?>" >
        <input type="submit">
    </form>
</body>
</html>