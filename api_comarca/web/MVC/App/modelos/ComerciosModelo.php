<?php
    class ComerciosModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getNegocios(){
            $this->db->query();

            return $this->db->registro();
        }

        public function getLocales(){
            $this->db->query("SELECT * FROM oferta o JOIN oferta_inmueble oi ON o.id_oferta = oi.id_oferta JOIN inmueble i JOIN local l ON i.id_inmueble = l.id_inmueble JOIN imagen im ON l.id_inmueble = im.id_inmueble");


            return $this->db->registros();   //función del controlador Base para obtener registros
        }
    }