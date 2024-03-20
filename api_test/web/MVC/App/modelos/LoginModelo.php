<?php

    class LoginModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function loginEmail($email){
            //SELECCIONO LOS DATOS DEL USUARIO DE UN EMAIL CONCRETO Y RELACIONADO CON EL ROL QUE LE CORRESPONDE
            $this->db->query("SELECT * FROM usuario U   
                                JOIN usuario_has_rol R ON U.id_usuario = R.id_usuario 
                                WHERE U.correo_usuario = :email");
             //Vinculamos los valores
             $this->db->bind(':email' ,$email);
             return $this->db->registro();
        }

        public function comprobarEntidad($user){
            $this->db->query("SELECT * FROM usuario_entidad WHERE id_usuario = :user");
             
            $this->db->bind(':user' ,$user);
            return $this->db->rowCount();

        }

        public function usuarioEntidad($user){
            $this->db->query("SELECT * FROM usuario_entidad WHERE id_usuario = :user");
            $this->db->bind(':user' ,$user);
            return $this->db->registro();
        }

    }