<?php 
class Sesion{
    /**
     * Devuelve el usuario o false si no se ha iniciado sesión
     */
    static public function getUsuario():Usuario{
        if(isset($_SESSION['usuario'])){
            return unserialize($_SESSION['usuario']); 
        }else{
            return false;
        }
    }

    static public function iniciarSesion($usuario){
        $_SESSION['usuario'] = serialize($usuario);
    }

    static public function cerrarSesion(){
        unset($_SESSION['usuario']);
    }
}
/**
 * Para iniciar sesión: Sesion::iniciarSesion($usuario);
 * Para cerrar sesión: Sesion::cerrarSesion();
 * Para obtener el usuario: Sesion::getUsuario()
 * Para obener una propiedad del usuario: Sesion::getUsuario()->getFoto()
 * Para comprobar si se ha iniciado sesión: if(Sesion::getUsuario())...
 */