<?php
    class Comercios extends Controlador {

        private $comerciosModelo;

        public function __construct() {
            $this->comerciosModelo = $this->modelo('ComerciosModelo');
        }

        public function negocios() {
            $this->vista('comercios/negocios');
        }
        
        public function locales() {
            $this->datos["locales"] = $this->comerciosModelo->getLocales();

            $this->vista('comercios/locales', $this->datos);
        }
    }