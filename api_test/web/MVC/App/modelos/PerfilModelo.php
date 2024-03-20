<?php

    class PerfilModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function docUser($user){
            //COJO LA DOCUMENTACION DEL USUARIO QUE HA INICIADO SESION
            $this->db->query("SELECT nombre_documento, tipo_documento, fecha_subida, ruta_archivo FROM documento WHERE id_usuario = :user");
            $this->db->bind(":user", $user);
            return $this->db->registros();
        }

        public function docInsert($nombre_base, $extension, $user){
            //COJO LA DOCUMENTACION DEL USUARIO QUE HA INICIADO SESION
            $fechaActual = date('Y-m-d');
            $ruta = 'doc_users/'.$user.'/';
            $this->db->query("INSERT INTO documento (nombre_documento, tipo_documento, fecha_subida, ruta_archivo, id_usuario) 
                                    VALUES (:nombre, :tipo, :fecha, :ruta, :user)");
            $this->db->bind(":nombre", $nombre_base);
            $this->db->bind(":tipo", $extension);
            $this->db->bind(":fecha", $fechaActual);
            $this->db->bind(":ruta", $ruta);
            $this->db->bind(":user", $user);
            $this->db->execute();
        }

        public function docRemove($file){
            $this->db->query("DELETE FROM documento WHERE nombre_documento = :fichero");
            $this->db->bind(":fichero", $file);
            $this->db->execute();
        }

    }