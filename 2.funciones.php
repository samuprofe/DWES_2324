<?php
//declare(strict_types=1); // Tipado fuerte, da error si los tipos no coinciden

/**
 * Función que suma dos enteros y devuelve la suma de éstos.
 * @param $a int o string
 * @param $b int o string
 */
function sumar(int|string $a,int|string $b):int {
    return $a+$b;
}

echo sumar("4",5);

//Paso de parámetros por referencia añadiendo & delante del nombre de la variable
function incrementar(int &$numero):int{
    return ++$numero;
}
$edad = 30;
$nueva_edad = incrementar($edad);
echo "\n Pepe tiene $edad años y se ha incrementado a $nueva_edad";

//Parmámetros con valor por defecto
function conectarDB(string $usuario='root', string $password='', string $host='localhost'){
    //Nos conectamos a MySQL con los parámetros...
    echo "\n<br>Conectado a $host con usuario $usuario / $password";
}
conectarDB();
conectarDB('pepe');
conectarDB('pepe','1234');
conectarDB('pepe','1234','192.168.1.11');

