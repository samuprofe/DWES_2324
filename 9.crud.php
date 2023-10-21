<?php 

$conn = new mysqli('localhost','root','','blog'); //Conecta con MySQL
if($conn->connect_error){
    echo "Error al conectar con MySQL: " . $conn->connect_error;
}

$sql = "Insert into usuarios (email,password,foto) values ('pepe@gmail.com','1234','usuario.jpg')";

if(!$conn->query($sql)){    //Si hay error en la SQL saltaría este fallo
    die("Error al ejecutar la sql " . $conn->error );
}

echo "Se ha insertado el usuario pepe@gmail.com con id=" . $conn->insert_id;

$idUsuario = $conn->insert_id; //Guardo el id que acabo de insertar



//Actualizar el usuario que acabamos de insertar y  cambiar el email a juan@gmail.com
$sql = "UPDATE usuarios set email='juan@gmail.com' WHERE id = " . $conn->insert_id;

if(!$conn->query($sql)){    //Si hay error en la SQL saltaría este fallo
    die("Error al ejecutar la sql " . $conn->error );
}
 echo "<br>Se ha actualizado el usuario con id " . $idUsuario . " y se ha puesto email = juan@gmail.com";



//Borrar todos los usuarios cuyo email contenga el texto 'juan' e indicar cuantas filas se han borrado
$sql = "DELETE FROM usuarios WHERE email LIKE '%juan%'";

if(!$conn->query($sql)){    //Si hay error en la SQL saltaría este fallo
    die("Error al ejecutar la sql " . $conn->error );
}
echo "<br>Se han borrado " . $conn->affected_rows . " usuarios que tenían en el email el texto juan";



//Insertar el email manolo@gmail.com y password 1234 y crear un mensaje de este usuario

$sql = "INSERT INTO usuarios (email,password,foto) VALUES ('manolo@gmail.com','1234','usuario.jpg')";
if(!$conn->query($sql)){    //Si hay error en la SQL saltaría este fallo
    die("Error al ejecutar la sql " . $conn->error );
}

$idUsuario = $conn->insert_id;
$sql = "INSERT INTO mensajes (titulo, texto, idUsuario) VALUES ('título del mensaje','texto del mensaje',$idUsuario)";
if(!$conn->query($sql)){    //Si hay error en la SQL saltaría este fallo
    die("Error al ejecutar la sql " . $conn->error );
}
echo "<br>Se ha insertado el usuario manolo@gmail.com con id $idUsuario y un mensaje para este usuario";


//Mostrar datos del usuario con id 15
$sql = "SELECT * FROM usuarios WHERE id =15";
if(!$result = $conn->query($sql)){
    die("Error al ejecutar la sql " . $conn->error );
}
echo "<br>El número de filas que ha devuelto la sql es " . $result->num_rows . '<br>';
$fila = $result->fetch_assoc();
echo "Email: $fila[email] <br>";
echo "Password: $fila[password] <br>";
echo "Foto: $fila[foto] <br>";

//Mostrar datos de todos los usuarios
$sql = "SELECT * FROM usuarios";
if(!$result = $conn->query($sql)){
    die("Error al ejecutar la sql " . $conn->error );
}
echo "<br><br>El número de filas que ha devuelto la sql es " . $result->num_rows . '<br>';
while($fila = $result->fetch_assoc()){
    echo "$fila[id] $fila[email] - $fila[password] - $fila[foto] <br>";
}

