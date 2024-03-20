<?php
    class Inicio extends Controlador {
        private $loginModelo;
        public function __construct() {
            $this->loginModelo = $this->modelo('LoginModelo');
        }

        public function index() {
            if(Sesion::sesionCreada($this->datos)){
                $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
                if ($validar > 0) {
                    $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
                }
            }
            
            $this->vista('inicio',$this->datos);
           
        }

        public function cookie() {
            
            $this->vista('cookie',$this->datos);
           
        }

        public function logout(){
            Sesion::cerrarSesion();
            redireccionar('/');
        }
    }