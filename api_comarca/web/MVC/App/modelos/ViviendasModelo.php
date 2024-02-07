<?php

    class ViviendasModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function getViviendas(){
            $this->db->query("SELECT * FROM oferta o JOIN oferta_inmueble oi JOIN inmueble i JOIN vivienda v  
                                WHERE o.id_oferta=oi.id_oferta AND i.id_inmueble=v.id_inmueble");
            
            // $this->db->query("SELECT * FROM oferta o JOIN oferta_inmueble oi ON o.id_oferta = oi.id_oferta JOIN inmueble i JOIN local l ON i.id_inmueble = l.id_inmueble JOIN imagen im ON l.id_inmueble = im.id_inmueble");

            return $this->db->registros();
        }
     
        public function getImagenes(){
            $this->db->query("SELECT * FROM imagen");
            
            return $this->db->registros();
        }
    }