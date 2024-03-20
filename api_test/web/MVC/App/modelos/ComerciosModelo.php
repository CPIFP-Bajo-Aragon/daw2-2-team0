<?php
    class ComerciosModelo {
        private $db;

        public function __construct() {
            $this->db = new Base;
        }

        public function getOfertasNegocios() {
            $this->db->query("SELECT * FROM negocio");

            return $this->db->registros();
        }

        public function getOfertasNegociosLocal() {
            $this->db->query("SELECT * FROM oferta o
                                JOIN negocio n ON o.id_negocio = n.id_negocio
                                JOIN `local` l ON id_local = local_id_inmueble
                                JOIN oferta_inmueble oi ON l.id_inmueble = oi.id_inmueble WHERE o.activo_oferta = 1");

            return $this->db->registros();
        }

        public function getOfertasLocales() {
            $this->db->query("SELECT * FROM oferta o
                                JOIN oferta_inmueble oi ON o.id_oferta = oi.id_oferta
                                JOIN `local` l ON oi.id_inmueble = l.id_inmueble WHERE o.activo_oferta = 1");

            return $this->db->registros();
        }

        public function getLocales($id_inmueble) {
            $this->db->query("SELECT * FROM inmueble i
                                JOIN `local` l ON i.id_inmueble = l.id_inmueble
                                WHERE :id_inmueble = l.id_inmueble");
            
            $this->db->bind(':id_inmueble' ,$id_inmueble);

            return $this->db->registros();
        }

        public function getImagenes($id_inmueble) {
            $this->db->query("SELECT * FROM imagen
                                WHERE :id_inmueble = id_inmueble");
            
            $this->db->bind(':id_inmueble' ,$id_inmueble);

            return $this->db->registros();
        }

        public function getMunicipios($id_inmueble) {
            $this->db->query("SELECT * FROM municipio m
                                JOIN inmueble i ON m.id_municipio = i.id_municipio
                                WHERE :id_inmueble = id_inmueble");

            $this->db->bind(':id_inmueble' ,$id_inmueble);

            return $this->db->registros();
        }
        
        public function getEstados($id_inmueble) {
            $this->db->query("SELECT * FROM estado e 
                                JOIN inmueble i ON e.id_estado = i.id_estado
                                WHERE :id_inmueble = id_inmueble");
            
            $this->db->bind(':id_inmueble' ,$id_inmueble);            

            return $this->db->registros();
        }
    }