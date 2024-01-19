<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $error ?>
    <form action="index.php?accion=insertar_mensaje" method="post">
        <input type="text" name="titulo" placeholder="Titulo"><br>
        <textarea name="texto" placeholder="Texto"></textarea><br>
        <input type="submit">
    </form>
</body>
</html>