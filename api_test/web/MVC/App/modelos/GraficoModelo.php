<?php
    class GraficoModelo {
        private $db;

        public function __construct() {
            $this->db = new Base;
        }

        public function selectUsuario(){
            $this->db->query("SELECT * FROM usuario");
            return $this->db->registros();
        }
    
        // Método para calcular edades
        public function calcularEdad($usuarios) {
            $edades = array();
            $fechaActual = new DateTime();
            foreach ($usuarios as $usuario) {
                $fechaNacimiento = new DateTime($usuario->fecha_nacimiento_usuario);
                $edad = $fechaNacimiento->diff($fechaActual)->y;
                $edades[] = $edad;
            }
            return $edades;
        }

    }