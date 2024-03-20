<?php

class Sesion {
    public static function crearSesion($usuarioSesion){
        $sessionTime = 365 * 24 * 60 * 60;  //Duracion de un año
        session_set_cookie_params($sessionTime);
        session_start();
        session_regenerate_id();
        $_SESSION["usuarioSesion"] = $usuarioSesion;
    }

    public static function iniciarSesion(&$datos = []){  //Comprobamos que la sesion esta iniciada
        session_start();
        if(isset($_SESSION["usuarioSesion"])){
            $datos['usuarioSesion'] = $_SESSION["usuarioSesion"];
        } else {
            session_destroy();
            redireccionar('/login/');
        }
    }

    public static function sesionCreada(&$datos = []){  //Comprobamos que la sesion esta iniciada
        session_start();
        if(isset($_SESSION["usuarioSesion"])){
            $datos['usuarioSesion'] = $_SESSION["usuarioSesion"];
            return true;
        } else {
            return false;
        }
    }

    public static function cerrarSesion(){
        session_start();
        setcookie(session_name(), '', time() -3600, "/");
        session_unset();
        session_destroy();
        $_SESSION = array();
    }
}