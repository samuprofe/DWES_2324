<?php 

//Dos formas de crear arrays
$alumnosDAW = ['pepe', 'juan', 'maria'];
$alumnosDAM = array('pepe','david','antonio');

//Modificar un elemento de un array
$alumnosDAM[0]='Jose';

//Añadir un elemento al final de un array
$alumnosDAM[] = 'Rocio';

//Añadir un elemento en una posición concreta del array
$alumnosDAM[10] = 'Javier';

foreach ($alumnosDAM as $alumno) {
    echo "$alumno\n";
}


//Array asociativo (las posiciones las nombramos con texto en vez de con un índice numérico)
$edadAlumnos = ['pepe'=>21, 'monica'=>19, 'juan'=>22];

foreach ($edadAlumnos as $posicion => $valor) {
    echo "$posicion: $valor\n";
}

echo "<br>";

//Arrays de dos dimensiones
$cars = [['Volvo',23,4], ['Land Rover',44,33],['Saab',34,33]];
foreach($cars as $car){
    echo "Marca: " . $car[0] . ". Stock: " . $car[1] . ". Vendidos: " . $car[2] ."<br>";
}

foreach ($_SERVER as $posicion => $valor){
    echo "$posicion: $valor<br>";
}

