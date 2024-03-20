<?php
    class Validoferta extends Controlador {

        private $validofertaModelo;
        private $loginModelo;
        public function __construct() {

            Sesion::iniciarSesion($this->datos);
            $this->validofertaModelo = $this->modelo('ValidofertaModelo');
            $this->loginModelo = $this->modelo('LoginModelo');
            $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
            if ($validar > 0) {
                $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
            }
        }

        public function index() {
            if (isset($_POST['ok'])) {
                $validar_ofer = $_POST['id_oferta'];
                $this->validofertaModelo->aceptaroferta($validar_ofer);
            }
            else if (isset($_POST['bad'])) {
                $validar_ofer = $_POST['id_oferta'];
                $this->validofertaModelo->rechazaroferta($validar_ofer);
            }
            $this->datos['ofertas_valid'] = $this->validofertaModelo->ofertasvalid();
        
            $this->vista("validoferta", $this->datos);
        }

    }
