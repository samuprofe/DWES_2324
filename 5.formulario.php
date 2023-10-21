<?php 
//GET, se envía por la barra de direcciones y es visible. Tiene un límite de 2000 caracteres. No permite envío de archivos.
//POST, no es visible en la barra de direcciones, No tiene límite de caracteres. Permite el envío de archivos.
echo "La petición de esta página se ha hecho por " . $_SERVER['REQUEST_METHOD'] . "<br>";
if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    echo "email: ". $_POST['email'] . "<br>";
    echo "password: ". $_POST['password'] . "<br>";
}

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    if($_POST['email']=='samuel@iesjuanbosco.es' && $_POST['password']=='1234'){
        echo "Usuario correcto";
    } else {
        echo "Usuario incorrecto";
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
    <form action="5.formulario.php" method="post">
        <input name="email" type="email" placeholder="Email..."><br>
        <input name="password" type="password" placeholder="Password"><br>
        <input type="submit" value="Login"><br>
    </form>
</body>
</html>