<?php
//Función para limpiar los textos que vienen de formularios
function limpiar_string(string $datos):string{
    $datos = trim($datos);  //Quita los caracteres en blanco del principio y del final
    $datos = htmlspecialchars($datos);  //Convierte los caracteres con sentido para html (<, >, ...) en entidades equivalentes
    return $datos;
}

//Declaramos las variables para que no fallen en los value="" del html la primera vez que entramos
$nombre = $apellidos = $email = $password = $password2 = '';
$comentarios = $provincia = $genero = $condiciones = '';
$msje_error_condiciones = $msje_error_email = $msje_error_password = $msje_error_password2 = '';

if($_SERVER['REQUEST_METHOD']=='POST'){     //Aquí sólo entra cuando se envíe el formulario
    //Limpiamos todos los datos que vienen del formulario
    $nombre = limpiar_string($_POST['nombre']);
    $apellidos = limpiar_string($_POST['apellidos']);
    $email = limpiar_string($_POST['email']);
    $password = limpiar_string($_POST['password']);
    $password2 = limpiar_string($_POST['password2']);
    $comentarios = limpiar_string($_POST['comentarios']);
    $provincia = limpiar_string($_POST['provincia']);
    if (isset($_POST['genero'])){
        $genero = limpiar_string($_POST['genero']);
    }else{
        $genero = "No indicado";
    }
    if(isset($_POST['condiciones'])){
        $condiciones = true;
    }else{
        $condiciones = false;
    }

    /*
    Validación de campos obligatorios y otras
    */
    $error = false;
    
    //Comprobar si el email es un email de verdad
    if(filter_var($email,FILTER_VALIDATE_EMAIL)==false){
        $error = true;
        $msje_error_email = "El email no tiene el formato correcto";
    }
    
    if(empty($email)){
        $error = true;
        $msje_error_email = "Debe escribir un email";
    }
    
    if(strlen($password)<4){
        $error = true;
        $msje_error_password = "Debe escribir un password de al menos 4 caracteres";        
    }
    if($password!=$password2){
        $error=true;
        $msje_error_password2 = "Los dos passwords no son iguales";
    }
    if(!$condiciones){
        $error = true;
        $msje_error_condiciones = "Debe aceptar las condiciones";        
    }
    
    
    //Si no hay error redirigimos a una página que muestra que el registro se ha completado
    if(!$error){
        header("Location: 6.registro_completo.php");   //Redirige a la página 6.registro_completo.php
        die(); //Para la ejecución para que no siga ejecutándolse el resto del código de la página

    }
}

?><!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .mensaje_error{
            color:red;
            font-style: oblique;
            font-size: 0.7em;
        }
    </style>
</head>
<body>
    <form action="6.registro.php" method="post">
        <input type="text" name="nombre" placeholder="Nombre..." value="<?= $nombre ?>"> <br>
        <input type="text" name="apellidos" placeholder="Apellidos..." value="<?= $apellidos?>"><br>
        <input type="email" name="email" placeholder="Email..." value="<?= $email?>">
        <span class="mensaje_error">* <?= $msje_error_email ?></span><br>
        <input type="password" name="password" placeholder="Password..." value="<?= $password ?>">
        <span class="mensaje_error">* <?= $msje_error_password ?></span><br>
        <input type="password" name="password2" placeholder="Repite password..." value="<?= $password2 ?>">
        <span class="mensaje_error">* <?= $msje_error_password2 ?></span><br>
        Genero <input type="radio" name="genero" value="masculino" <?php if ($genero=='masculino') echo 'checked'; ?> > Masculino
        <input type="radio" name="genero" value="femenino" <?php if ($genero=='femenino') echo 'checked'; ?> > Femenino<br>
        <input type="checkbox" name="condiciones" <?php if ($condiciones) echo 'checked'; ?>>Acepto las condiciones
        <span class="mensaje_error">* <?= $msje_error_condiciones ?></span><br>
        Comentarios:<br>
        <textarea name="comentarios"><?= $comentarios ?></textarea><br>
        <select name="provincia">
            <option></option>
            <option <?php if($provincia=='Toledo') echo 'selected'; ?> >Toledo</option>
            <option <?php if($provincia=='Ciudad Real') echo 'selected'; ?>>Ciudad Real</option>
            <option <?php if($provincia=='Guadalajara') echo 'selected'; ?>>Guadalajara</option>
            <option <?php if($provincia=='Cuenca') echo 'selected'; ?>>Cuenca</option>
            <option <?php if($provincia=='Albacete') echo 'selected'; ?>>Albacete</option>
        </select><br><br>
        <input type="submit" value="Enviar"> <br>
    </form>
</body>
</html>