<?php
    class Comercios extends Controlador {

        private $comerciosModelo;
        private $loginModelo;

        public function __construct() {
            if(Sesion::sesionCreada($this->datos)){
                $this->loginModelo = $this->modelo('LoginModelo');
                $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
                if ($validar > 0) {
                    $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
                }
            }
            
            $this->comerciosModelo = $this->modelo('ComerciosModelo');
            
        }

        public function negocios() {
            $ofertas = $this->comerciosModelo->getOfertasNegociosLocal();

            foreach ($ofertas as $oferta) {
                $locales = $this->comerciosModelo->getLocales($oferta->id_inmueble);
                $oferta->locales = $locales;

                foreach ($locales as $local) {
                    $local->imagenes = $this->comerciosModelo->getImagenes($local->id_inmueble);
                }

                foreach ($locales as $local) {
                    $local->municipios = $this->comerciosModelo->getMunicipios($local->id_inmueble);
                }

                foreach ($locales as $local) {
                    $local->estados = $this->comerciosModelo->getEstados($local->id_inmueble);
                }
            }
            
            $this->datos['ofertas'] = $ofertas;

            // print_r($this->datos);
            // exit;

            $this->vista('comercios/negocios', $this->datos);
        }
        
        public function locales() {
            $ofertas = $this->comerciosModelo->getOfertasLocales();

            foreach ($ofertas as $oferta) {
                $locales = $this->comerciosModelo->getLocales($oferta->id_inmueble);
                $oferta->locales = $locales;

                foreach ($locales as $local) {
                    $local->imagenes = $this->comerciosModelo->getImagenes($local->id_inmueble);
                }

                foreach ($locales as $local) {
                    $local->municipios = $this->comerciosModelo->getMunicipios($local->id_inmueble);
                }

                foreach ($locales as $local) {
                    $local->estados = $this->comerciosModelo->getEstados($local->id_inmueble);
                }
            }

            $this->datos['ofertas'] = $ofertas;

            // print_r($this->datos);
            // exit;

            $this->vista('comercios/locales', $this->datos);
        }
    }