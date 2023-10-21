<?php 
function imprimirTablaMultiplicar(int $numero = 10, int $red=255, int $green=255, int $blue=255){
    for($j=1;$j<=$numero;$j++){
        for($i=1;$i<=10;$i++){
            echo "<div class=\"celda\" style=\"background-color:rgb($red,$green,$blue)\">"
                 . $i*$j 
                 .'</div>';
        }
        echo "<br>";

    }
}

function imprimirTablaColores(int $numero = 10){
    for($j=1;$j<=$numero;$j++){
        for($i=1;$i<=10;$i++){
            $red = rand(0,255);
            $green = rand(0,255);
            $blue = rand(0,255);
            echo "<div class=\"celda\" style=\"background-color:rgb($red,$green,$blue)\">"
                 . $i*$j 
                 .'</div>';
        }
        echo "<br>";

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        .celda{
            border: 1px solid black;
            display: inline-block;
            width: 20px;
            padding: 6px;
            text-align: center;
            margin: 1px;
        }
    </style>
</head>
<body>
    <?php
    imprimirTablaMultiplicar(5); //Imprime tabla de multiplicar hasta el 5
    
    echo "<br>";

    imprimirTablaMultiplicar(); //Imprime tabla multplicar hasta el 10 (valor por defecto)
    
    echo "<br>";
    
    imprimirTablaMultiplicar(3,255,0,0); //Imprime tabla multiplicar hasta el 3 con color de fondo
    
    echo "<br>";

    imprimirTablaColores(10);

    ?>
    <script>
        setTimeout(function(){location.reload();},500);
    </script>
</body>
</html>