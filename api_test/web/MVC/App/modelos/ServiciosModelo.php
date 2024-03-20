<?php

    class ServiciosModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }


        public function listarpueblos(){
            $this->db->query("SELECT * FROM municipio");
            return $this->db->registros();
        }

        public function ubicarpueblos($pueblo){
            $this->db->query("SELECT * FROM municipio
                                WHERE nombre_municipio = :municipio");
            $this->db->bind(":municipio", $pueblo);
            return $this->db->registro();
        }

        public function listarservicios($pueblo){
            $this->db->query("SELECT * FROM servicio s
                                JOIN municipio m ON s.id_municipio = m.id_municipio
                                WHERE m.nombre_municipio = :municipio");
            $this->db->bind(":municipio", $pueblo);
            return $this->db->registros();
        }

      
    }

