<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?= $error ?>
    <form action="index.php?accion=editar_mensaje&id=<?= $idMensaje ?>" method="post">
        <input type="text" name="titulo" placeholder="Titulo" value="<?=$mensaje->getTitulo()?>"><br>
        <textarea name="texto" placeholder="Texto"><?=$mensaje->getTexto()?></textarea><br>
        <select name="idUsuario">
            <?php foreach($usuarios as $usuario): ?>
                <?php if($usuario->getId() == $mensaje->getIdUsuario()):?>
                    <option value="<?= $usuario->getId() ?>" selected><?= $usuario->getEmail() ?></option>
                <?php else: ?>
                    <option value="<?= $usuario->getId() ?>"><?= $usuario->getEmail() ?></option>
                <?php endif; ?>
            <?php endforeach; ?>
        </select><br>
        <input type="submit">
    </form>
</body>
</html>