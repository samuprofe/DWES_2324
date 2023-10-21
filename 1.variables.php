<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        
        <h1>index.php</h1>
        <?php 

        define("MYSQL_USER","root");    //Define constantes, se utiliza para parámetros de configuración 

        echo MYSQL_USER;

        $variable = "hola";
        $numero = 34;
        $decimal = 3.14;
        $decimal = "hola";
        $nombreCompleto = "Martin del Pozo, Pepe";

        echo 'Esto es un texto<br>';
        echo "El valor de la variable \"\$numero\" es $numero <br>";
        echo 'El valor de la variable "$numero" es $numero <br>';
        echo 'El valor de la variable "$numero" es ' . $numero . '<br>';

        echo "el número de caracteres de la variable nombre " . strlen($nombreCompleto) . "<br>";

        //Separar la variable $nombreCompleto y guardar en $nombre solo el nombre
        //y en $apellidos los apellidos
        $array = explode(", ", $nombreCompleto);
        $apellidos = $array[0];
        $nombre = $array[1];

        echo "$nombre $apellidos <br>";

        $apellidos = substr($nombreCompleto,0,strpos($nombreCompleto,","));
        $nombre = substr($nombreCompleto,strpos($nombreCompleto,",")+2, strlen($nombreCompleto));
        echo "$nombre $apellidos <br>";

        var_dump($variable);
        var_dump($numero);
        var_dump($decimal);

        for($i=0;$i<=100;$i++){
            echo $i . "<br>";
        }        

        
        ?>
    </body>
</html>
