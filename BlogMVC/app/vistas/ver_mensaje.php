
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
    .ver_mensaje{
        margin: 30px auto;
        padding:5px;
        border:1px solid black;
        width: 80%;
        min-height: 400px;
    }
    .titulo{
        font-size: 2em;
    }
    .texto{
        font-size: 1.5em;
    }

    </style>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="ver_mensaje">
    <?php if( $mensaje!= null): ?>
        <div class="titulo"><?= $mensaje->getTitulo() ?> </div>
        <div class="texto"><?= $mensaje->getTexto() ?> </div>
        <div class="fecha"><?= $mensaje->getFecha() ?> </div>
    <?php else: ?>
        <strong>Mensaje con id <?= $id ?> no encontrado</strong>
    <?php endif; ?>
    <br><br><br>
    <a href="index.php">Volver al listado de mensajes</a>
</div>
</body>
</html>