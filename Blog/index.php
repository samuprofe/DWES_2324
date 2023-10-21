<?php 

require_once 'modelos/ConnexionDB.php';
require_once 'modelos/Mensaje.php';
require_once 'modelos/MensajesDAO.php';



//Creamos la conexión utilizando la clase que hemos creado
$connexionDB = new ConnexionDB('root','','localhost','blog');
$conn = $connexionDB->getConnexion();

//Creamos el objeto MensajesDAO para acceder a BBDD a través de este objeto
$mensajeDAO = new MensajesDAO($conn);

if($_SERVER['REQUEST_METHOD']=='POST'){
    $id = $_POST['id'];
}
else{
    //Obtenemos el mensaje con id 1
    $id = 1;
}
$mensaje = $mensajeDAO->getById($id);

?>

<?php if( $mensaje!= null): ?>
    <strong>Id:</strong> <?= $mensaje->getId() ?> <br>
    <strong>Titulo:</strong> <?= $mensaje->getTitulo() ?> <br>
    <strong>Texto:</strong> <?= $mensaje->getTexto() ?> <br>
<?php else: ?>
    <strong>Mensaje con id <?= $id ?> no encontrado</strong>
<?php endif; ?>

<form action="index.php" method="post">
    <input type="text" name="id" placeholder="id del usuario">
    <input type="submit">
</form>