<?php 
session_start();    ///Necesario para utilizar variables de sesión

if(!isset($variable)){
    $variable = 5;
}
else{
    $variable++;
}
echo '$variable: ' . $variable . '<br>';

/** Variables de sesión, mantienen su valor aunque recargemos la página y en otras páginas del sitio
 *  hasta que cerremos el navegador, en ese momento se eliminan
 */

if(!isset($_SESSION['variable'])){
    $_SESSION['variable'] = 5;
}
else{
    $_SESSION['variable']++;
}
echo '$_SESSION[variable]:' . $_SESSION['variable'] . '<br>';

/**
 * Cookies, guarda un nombre y valor en el ordenador del cliente. Cuando
 * el cliente vuelve a entrar en la misma página se la envía al servidor.
 */

if(!isset($_COOKIE['numero'])){
    setcookie("numero","5",time()+60*60*24);
    echo "Se ha creado una cookie en el cliente con el nombre numero y valor 5";
}else{
    setcookie("numero",$_COOKIE['numero']+1,time()+60*60*24);
    echo "Se ha actualizado la cookie al valor " . $_COOKIE['numero']+1;
}
//echo "La cookie numero tiene el valor $_COOKIE[numero] <br>";