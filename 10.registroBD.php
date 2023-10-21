<?php 
$password=$password2=$email=$pass_err=$email_err='';

if($_SERVER['REQUEST_METHOD']=='POST'){
    $password = $_POST['password'];
    $password2 = $_POST['password2'];
    $email = $_POST['email'];

    $error = false;
    
    if(empty($email)){
        $error=true;
        $email_err="El email no puede estar en blanco";
    }
    if($password != $password2){
        $error = true;
        $pass_err = "Las contraseñas no coinciden";
    }
    if(strlen($password)<4){
        $error = true;
        $pass_err = "La contraseña debe tener al menos 4 caracteres";
    }
    if(!$error){   //Si no hay error metemos al usuario en la BBDD
        
        $conn = new mysqli('localhost','root','','blog'); //Conecta con MySQL
        if($conn->connect_error){
            echo "Error al conectar con MySQL: " . $conn->connect_error;
        }

        $sql = "Insert into usuarios (email,password) values ('$email', '$password')";

        if(!$conn->query($sql)){    //Si hay error en la SQL saltaría este fallo
            die("Error al ejecutar la sql " . $conn->error );
        }
        
        //header('Location: registro_completado.php');  deberíamos hacer esto pero no tenemos creada la página y para probar ponemos solo un mensaje y paramos
        die("Registro completo");
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
    <form action="10.registroBD.php" method="post">
        <input type="email" name="email" placeholder="Email" value="<?= $email ?>"> <span class="error"><?= $email_err ?></span><br>
        <input type="password" name="password" placeholder="Password" value="<?= $password ?>"> <span class="error"><?= $pass_err ?></span><br>
        <input type="password" name="password2" placeholder="Repite el password" value="<?= $password2 ?>"><br>
        <input type="file" name="foto"><br>
        <input type="submit">
    </form>
</body>
</html>