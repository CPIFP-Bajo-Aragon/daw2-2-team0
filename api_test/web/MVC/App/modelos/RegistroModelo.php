<?php

    class RegistroModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function comprobarUser($nif, $email_user){
            //VERIFICAR QUE EL USUARIO NO EXISTE ANTES, CONDICION DE SI ENCUENTRA UNA FILA CON ESE EMAIL || NIF || TELEFONO, USUARIO EXISTENTE
            $this->db->query("SELECT * FROM usuario WHERE nif=:dni OR correo_usuario=:email_user");
            $this->db->bind(':dni', $nif);
            $this->db->bind(':email_user', $email_user);
            $comprobar = $this->db->rowCount();
            return $comprobar;
            
        }

        public function registroUser($nif, $nom_user, $apellido_user, $email_user, $pass, $fecha_nac_user, $telefono_user){
           
                //PREGUNTAR SI HACE FALTA ELSE
                $this->db->query("INSERT INTO usuario (nif, nombre_usuario, apellidos_usuario, correo_usuario, contrasena_usuario, fecha_nacimiento_usuario, telefono_usuario) 
                                    VALUES (:nif, :nom_user, :apellido_user, :correo_user, :pass_user, :date_user, :tel_user)");
                $this->db->bind(':nif', $nif);
                $this->db->bind(':nom_user', $nom_user);
                $this->db->bind(':apellido_user', $apellido_user);
                $this->db->bind(':correo_user', $email_user);
                $this->db->bind(':pass_user' , password_hash($pass, PASSWORD_BCRYPT));
                $this->db->bind(':date_user', $fecha_nac_user);
                $this->db->bind(':tel_user', $telefono_user);
                if($this->db->execute()){
                    return 1;
                }
        }
        
        public function comprobarEntidad($nif, $nom_entidad, $cif_entidad, $dir_entidad, $numero_entidad, $correo_entidad){
            $this->db->query("SELECT * FROM entidad WHERE cif_entidad=:cif OR correo_entidad=:email_entidad");
            $this->db->bind(':cif', $cif_entidad);
            $this->db->bind(':email_entidad', $correo_entidad);
            $comprobar = $this->db->rowCount();
            if ($comprobar != 0) {
                return $this->borrarUser($nif);
            }else{
                return $this->registroEntidad($nom_entidad, $cif_entidad, $dir_entidad, $numero_entidad, $correo_entidad);
            }
        }

        public function borrarUser($nif){
            $this->db->query("DELETE FROM usuario WHERE nif=:dni");
            $this->db->bind(':dni', $nif);
            $this->db->execute();
            return 0;
        }

        public function registroEntidad($nom_entidad, $cif_entidad, $dir_entidad, $numero_entidad, $correo_entidad){
            $this->db->query("INSERT INTO entidad (nombre_entidad, cif_entidad, direccion_entidad, numero_telefono_entidad, correo_entidad) 
            VALUES (:nom_entidad, :cif, :direccion_entidad, :tel_entidad, :email_entidad)");
            $this->db->bind(':nom_entidad', $nom_entidad);
            $this->db->bind(':cif', $cif_entidad);
            $this->db->bind(':direccion_entidad', $dir_entidad);
            $this->db->bind(':tel_entidad', $numero_entidad);
            $this->db->bind(':email_entidad', $correo_entidad);
            if($this->db->execute()){
                return 1;
            }else{
                return 0;
            }

        }

        public function rolUser($nif){
            $this->db->query("SELECT * FROM usuario WHERE nif=:dni");
            $this->db->bind(':dni', $nif);
            $idusuario = $this->db->registro();
            $id = $idusuario ->id_usuario;
            return $this->insert_rolUser($id);
        }
        
        public function insert_rolUser($id){
            $this->db->query("INSERT INTO usuario_has_rol (id_usuario, id_rol) VALUES (:usuario, 2)"); 
            $this->db->bind(':usuario', $id);
            if($this->db->execute()){
                return 1;
            }else{
                return 0;
            }
        }

        public function selectEntidad($cif){
            $this->db->query("SELECT * FROM entidad WHERE cif_entidad=:cif");
            $this->db->bind(':cif', $cif);
            $identidad = $this->db->registro();
            $id = $identidad->id_entidad;
            return $id;
        }

        public function rolUserEntidad($nif, $cif_entidad){
            $this->db->query("SELECT * FROM usuario WHERE nif=:dni");
            $this->db->bind(':dni', $nif);
            $idusuario = $this->db->registro();
            $id_user = $idusuario ->id_usuario;
            $valid = $this->insert_rolUser($id_user);
            if ($valid == 1) {
                $id_entidad = $this->selectEntidad($cif_entidad);
                return $this->relUserEntidad($id_user, $id_entidad);
            }
        }

        public function relUserEntidad($id_user, $id_entidad){
            $this->db->query("INSERT INTO usuario_entidad (id_usuario, id_entidad , rol) VALUES (:usuario,:entidad, 2)"); 
            $this->db->bind(':usuario', $id_user);
            $this->db->bind(':entidad', $id_entidad);
            if($this->db->execute()){
                return 1;
            }else{
                return 0;
            }
        }
    }