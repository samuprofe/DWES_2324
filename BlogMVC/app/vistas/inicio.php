
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
            <a href="index.php?accion=registrar">registrar</a>
        </form>
    <?php endif; ?>
</header>

<main>
    <?php 
        imprimirMensaje();
    ?>
    <?php foreach ($mensajes as $mensaje): ?>
        <?php
        if(Sesion::existeSesion()){
            //Compruebo si existe un favorito para este mensaje del usuario conectado
            $FavoritosDAO = new FavoritosDAO($conn);
            $idUsuario = Sesion::getUsuario()->getId();
            $idMensaje = $mensaje->getId();
            $existeFavorito = $FavoritosDAO->existByIdUsuarioIdMensaje($idUsuario, $idMensaje);
            $numFavoritos = $FavoritosDAO->countByIdMensaje($idMensaje);
        }
        ?>
        <div class="mensaje">
           <h4 class="titulo">
            <a href="index.php?accion=ver_mensaje&id=<?=$mensaje->getId()?>"><?= $mensaje->getTitulo() ?></a>
            </h4>
            
            <?php if(Sesion::getUsuario() && Sesion::getUsuario()->getId()==$mensaje->getIdUsuario()): ?>
                <span class="icono_borrar"><a href="index.php?accion=borrar_mensaje&id=<?=$mensaje->getId()?>"><i class="fa-solid fa-trash color_gris"></i></a></span>
                <span class="icono_editar"><a href="index.php?accion=editar_mensaje&id=<?=$mensaje->getId()?>"><i class="fa-solid fa-pen-to-square color_gris" "></i></a></span>
            <?php endif; ?>
           <p class="texto"><?= $mensaje->getTexto() ?></p>
           <img src="web/fotosUsuarios/<?= $mensaje->getUsuario()->getFoto() ?>" height="100px">
           <span><?= $mensaje->getUsuario()->getEmail() ?></span>
           <?php if(Sesion::existeSesion()): ?>
            <?php if($existeFavorito): ?>
                    <i class="fa-solid fa-heart iconoFavoritoOn" data-idMensaje="<?= $mensaje->getId()?>"></i>
                <?php else: ?>
                    <i class="fa-regular fa-heart iconoFavoritoOff" data-idMensaje="<?= $mensaje->getId()?>"></i>
                <?php endif; ?>
                <span class="numFavoritos"><?= $numFavoritos ?></span>
            <?php endif; ?>
        </div>
    <?php endforeach; ?>
    <?php if(Sesion::getUsuario()): ?>
        <a href="index.php?accion=insertar_mensaje" class="nuevoMensaje">Nuevo mensaje</a>
    <?php endif; ?>
</main>    
<script>

let favoritosOn = document.querySelectorAll('.iconoFavoritoOn');
favoritosOn.forEach(favoritoOn =>{
    favoritoOn.addEventListener('click',quitarFavorito);
});

let favoritosOff = document.querySelectorAll('.iconoFavoritoOff');
favoritosOff.forEach(favoritoOff =>{
    favoritoOff.addEventListener('click',ponerFavorito);
});

function ponerFavorito(){
        let idMensaje = this.getAttribute('data-idMensaje');
        fetch('index.php?accion=insertar_favorito&id='+idMensaje)
        .then(datos => datos.json())
        .then(respuesta =>{
            console.log(respuesta);
            this.classList.remove("iconoFavoritoOff");
            this.classList.remove("fa-regular");
            this.classList.add("iconoFavoritoOn");
            this.classList.add("fa-solid");
            this.parentNode.querySelector('.numFavoritos').innerHTML=respuesta.numFavoritos;
            this.removeEventListener('click',ponerFavorito);
            this.addEventListener('click',quitarFavorito);
        })
        
    }

function quitarFavorito(){
        let idMensaje = this.getAttribute('data-idMensaje');
        fetch('index.php?accion=borrar_favorito&id='+idMensaje)
        .then(datos => datos.json())
        .then(respuesta =>{
            console.log(respuesta);
            this.classList.remove("iconoFavoritoOn");
            this.classList.remove("fa-solid");
            this.classList.add("iconoFavoritoOff");
            this.classList.add("fa-regular");
            this.parentNode.querySelector('.numFavoritos').innerHTML=respuesta.numFavoritos;
            this.removeEventListener('click',quitarFavorito);
            this.addEventListener('click',ponerFavorito);
        })
        
}


</script>
</body>
</html>
