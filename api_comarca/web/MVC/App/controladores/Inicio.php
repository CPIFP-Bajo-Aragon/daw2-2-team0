<?php
    class Inicio extends Controlador {


        public function __construct() {
            
        }

        public function index() {
            Sesion::sesionCreada($this->datos);
            $this->vista('inicio');
        }

        public function logout(){
            Sesion::cerrarSesion();
            redireccionar('/');
        }
    }