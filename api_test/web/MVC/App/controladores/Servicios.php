<?php
    class Servicios extends Controlador {

        private $serviciosModelo;
        private $loginModelo;

        public function __construct() {
            if(Sesion::sesionCreada($this->datos)){
                $this->loginModelo = $this->modelo('LoginModelo');
                $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
                if ($validar > 0) {
                    $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
                }
            }
            $this->serviciosModelo = $this->modelo('ServiciosModelo');
        }

        public function index() {

            $this->datos['pueblos'] = $this->serviciosModelo->listarpueblos();

            $this->vista('servicios', $this->datos);
        }

        public function poblacion($pueblo){

            $this->datos['ubicacion'] = $this->serviciosModelo->ubicarpueblos($pueblo);

            $this->vistaApi($this->datos['ubicacion']);
        }

        public function servicios($pueblo){

            $this->datos['servicios'] = $this->serviciosModelo->listarservicios($pueblo);

            $this->vistaApi($this->datos['servicios']);
        }

  
    }