
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="web/css/estilos.css">
</head>
<body>
<header>
    <h1 class="tituloPagina">Todos los mensajes</h1>
    <?php if(Sesion::getUsuario()): ?>
        <img src="web/fotosUsuarios/<?= Sesion::getUsuario()->getFoto() ?>" class="fotoUsuario">
        <span class="emailUsuario"><?= Sesion::getUsuario()->getEmail() ?></span>
        <a href="index.php?accion=logout">cerrar sesión</a>
    <?php else: ?>
        <form action="index.php?accion=login" method="post">
            <input type="email" name="email" placeholder="email">
            <input type="password" name="password" placeholder="password">
            <input type="submit" value="login">
            <a href="registrar.php">registrar</a>
        </form>
    <?php endif; ?>
</header>

<main>
    <?php 
        imprimirMensaje();
    ?>
    <?php foreach ($mensajes as $mensaje): ?>
        <div class="mensaje">
           <h4 class="titulo">
            <a href="index.php?accion=ver_mensaje&id=<?=$mensaje->getId()?>"><?= $mensaje->getTitulo() ?></a>
            </h4>
            <?php if(isset($_SESSION['email']) && $_SESSION['id']==$mensaje->getIdUsuario()): ?>
                <span class="icono_borrar"><a href="borrar_mensaje.php?id=<?=$mensaje->getId()?>"><i class="fa-solid fa-trash color_gris"></i></a></span>
                <span class="icono_editar"><a href="editar_mensaje.php?id=<?=$mensaje->getId()?>"><i class="fa-solid fa-pen-to-square color_gris" "></i></a></span>
            <?php endif; ?>
           <p class="texto"><?= $mensaje->getTexto() ?></p>
           <img src="fotosUsuarios/<?= $mensaje->getUsuario()->getFoto() ?>" height="100px">
           <span><?= $mensaje->getUsuario()->getEmail() ?></span>
        </div>
    <?php endforeach; ?>
    <?php if(isset($_SESSION['email'])): ?>
        <a href="insertar_mensaje.php" class="nuevoMensaje">Nuevo mensaje</a>
    <?php endif; ?>
</main>    
<script>
setTimeout(function(){document.getElementById('mensajeError').style.display='none'},5000);
</script>
</body>
</html>
