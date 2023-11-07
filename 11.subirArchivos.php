<?php 
if($_SERVER['REQUEST_METHOD']=='POST'){
    //print_r($_FILES);
    $numElementos = count($_FILES['foto']['name']);
    for($i=0;$i<$numElementos; $i++){
        move_uploaded_file($_FILES['foto']['tmp_name'][$i], 'FotosSubidas/'.$_FILES['foto']['name'][$i]);
        print("Mover archivo " . $_FILES['foto']['tmp_name'][$i]. ' ------ > ' . $_FILES['foto']['name'][$i] . '<br>');
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
<form action="11.subirArchivos.php" method="post" enctype="multipart/form-data">
    <input type="file" name="foto[]" multiple>
    <input type="submit" value="subir">
</form>
</body>
</html>