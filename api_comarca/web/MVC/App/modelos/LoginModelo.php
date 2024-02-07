<?php

    class LoginModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function loginEmail($email){
            $this->db->query("SELECT * FROM usuario WHERE correo_usuario = :email");
             //Vinculamos los valores
             $this->db->bind(':email' ,$email);
             return $this->db->registro();
        }
    }