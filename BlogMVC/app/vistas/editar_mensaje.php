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
    <?= $error ?>
    <form action="index.php?accion=editar_mensaje&id=<?= $idMensaje ?>" method="post" data-idMensaje="<?=$idMensaje?>" id="formularioEditar">
        <input type="text" name="titulo" placeholder="Titulo" value="<?=$mensaje->getTitulo()?>"><br>
        <textarea name="texto" placeholder="Texto"><?=$mensaje->getTexto()?></textarea><br>
        <div id="fotos">
            <?php foreach($fotos as $foto): ?>
                <img src="web/images/<?=$foto->getNombreArchivo()?>" style="height: 100px; border: 1px solid black";>                
            <?php endforeach; ?>
            <div id="addImage">+</div>
            <input type="file" style="display: none;" id="inputFileImage">
        </div>
        <input type="submit">
    </form>
    <script type="text/javascript">
        let botonAddImage = document.getElementById('addImage');
        let idMensaje = document.getElementById('formularioEditar').getAttribute('data-idMensaje');
        botonAddImage.addEventListener('click',function(){
            document.getElementById('inputFileImage').click();
        });

        let inputFileImage = document.getElementById('inputFileImage');
        inputFileImage.addEventListener('change',function(){
            let formData = new FormData();
            let archivoFoto = inputFileImage.files[0];
            formData.append('foto',archivoFoto);
            fetch('index.php?accion=addImageMensaje&idMensaje='+idMensaje,{
                method: 'POST',
                body: formData
            })
            .then(datos => datos.json())
            .then(respuesta => {
                console.log(respuesta);
            })
         });
    </script>
</body>
</html>