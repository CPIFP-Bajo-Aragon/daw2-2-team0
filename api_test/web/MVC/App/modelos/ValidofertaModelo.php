<?php

    class ValidofertaModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function ofertasvalid(){
        
            $this->db->query("SELECT * FROM oferta o
                                JOIN negocio n ON o.id_negocio = n.id_negocio
                                JOIN `local` l ON id_local = local_id_inmueble
                                JOIN oferta_inmueble oi ON l.id_inmueble = oi.id_inmueble WHERE o.activo_oferta = 0");

            return $this->db->registros();
        }

        public function aceptaroferta($oferta){
            $this->db->query("UPDATE oferta SET activo_oferta = 1 WHERE id_oferta = :oferta");
            $this->db->bind(":oferta", $oferta);
            $this->db->execute();
        }

        public function rechazaroferta($oferta){
            $this->db->query("DELETE FROM oferta_inmueble WHERE id_oferta = :oferta");
            $this->db->bind(":oferta", $oferta);
            $this->db->execute();
        
            $this->db->query("SELECT * FROM oferta WHERE id_oferta = :oferta");
            $this->db->bind(":oferta", $oferta);
            $negocio = $this->db->registro();

            $this->db->query("DELETE FROM oferta WHERE id_oferta = :oferta");
            $this->db->bind(":oferta", $oferta);
            $this->db->execute();
            
            $this->db->query("SELECT * FROM negocio WHERE id_negocio = :negocio");
            $this->db->bind(":negocio", $negocio->id_negocio);
            $local = $this->db->registro();

            $this->db->query("DELETE FROM negocio WHERE id_negocio = :negocio ");
            $this->db->bind(":negocio", $negocio->id_negocio);
            $this->db->execute();

            $this->db->query("SELECT * FROM local WHERE id_local = :local");
            $this->db->bind(":local", $local->local_id_inmueble);
            $inmueble = $this->db->registro();

            $this->db->query("DELETE FROM local WHERE id_local = :local");
            $this->db->bind(":local", $local->local_id_inmueble);
            $this->db->execute();

            $this->db->query("DELETE FROM local WHERE id_inmueble = :inmueble");
            $this->db->bind(":inmueble", $inmueble->id_inmueble);
            $this->db->execute();
        }
    }