<?php

    class ValidarusuarioModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function mostrarusuarios(){
            $this->db->query("SELECT * FROM usuario");

            return $this->db->registros();
        }

        public function seleccionarUsuario($usuario){
            $this->db->query("SELECT * FROM usuario WHERE id_usuario = :usuario");
            $this->db->bind(":usuario", $usuario);   
            return $this->db->registro();
        }

        public function editarUsuario($usuario, $correo_usuario, $fecha_nac, $nombre, $apellidos, $nif, $telefono){
            $this->db->query("UPDATE usuario SET nif = :nif , nombre_usuario = :nombre_usuario, apellidos_usuario = :apellidos_usuario, correo_usuario = :correo_usuario,
                                                 fecha_nacimiento_usuario = :fecha_nacimiento_usuario, telefono_usuario = :telefono_usuario 
                                                WHERE id_usuario = :usuario");
            $this->db->bind(":usuario", $usuario);
            $this->db->bind(":nif", $nif);
            $this->db->bind(":nombre_usuario", $nombre);
            $this->db->bind(":apellidos_usuario", $apellidos);
            $this->db->bind(":correo_usuario", $correo_usuario);
            $this->db->bind(":fecha_nacimiento_usuario", $fecha_nac);
            $this->db->bind(":telefono_usuario", $telefono);
            $this->db->execute();
        }


        public function borrarUsuario($usuario){
            $this->db->query("DELETE FROM usuario_has_rol WHERE id_usuario = :usuario");
            $this->db->bind(":usuario", $usuario);
            $this->db->execute();

            $this->db->query("SELECT * FROM usuario_entidad WHERE id_usuario = :usuario");
            $this->db->bind(":usuario", $usuario);
            $verify = $this->db->rowcount();

            if($verify > 0){
                $this->db->query("DELETE FROM usuario_entidad WHERE id_usuario = :usuario");
                $this->db->bind(":usuario", $usuario);
                $this->db->execute();
            }

            $this->db->query("DELETE FROM usuario WHERE id_usuario = :usuario");
            $this->db->bind(":usuario", $usuario);
            $this->db->execute();
        }
    }