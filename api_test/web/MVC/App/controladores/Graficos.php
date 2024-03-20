<?php
    class Graficos extends Controlador {

        private $graficosModelo;
        private $loginModelo;

        public function __construct() {
            if(Sesion::sesionCreada($this->datos)){
                $this->loginModelo = $this->modelo('LoginModelo');
                $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
                if ($validar > 0) {
                    $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
                }
            }
            $this->graficosModelo = $this->modelo('GraficoModelo');
            
        }

        public function index() {
            $this->vista('graficos', $this->datos);
        }

        public function edades(){
            $usuarios = $this->graficosModelo->selectUsuario();
            $edades = $this->graficosModelo->calcularEdad($usuarios);
        
            // Contar las edades en cada rango
            $cantidad_por_rango = array(
                '16-25' => 0,
                '26-35' => 0,
                '36-45' => 0,
                '46-55' => 0,
                '56-65' => 0,
                '66-100' => 0
            );
        
            foreach ($edades as $edad) {
                if ($edad >= 16 && $edad <= 25) {
                    $cantidad_por_rango['16-25']++;
                } elseif ($edad >= 26 && $edad <= 35) {
                    $cantidad_por_rango['26-35']++;
                } elseif ($edad >= 36 && $edad <= 45) {
                    $cantidad_por_rango['36-45']++;
                } elseif ($edad >= 46 && $edad <= 55) {
                    $cantidad_por_rango['46-55']++;
                } elseif ($edad >= 56 && $edad <= 65) {
                    $cantidad_por_rango['56-65']++;
                } elseif ($edad >= 66 && $edad <= 100) {
                    $cantidad_por_rango['66-100']++;
                }
            }
        
            // Calcular porcentajes
            $total_usuarios = count($edades);
            $porcentajes = array();
            foreach ($cantidad_por_rango as $rango => $cantidad) {
                $porcentaje = ($cantidad / $total_usuarios) * 100;
                $porcentajes[$rango] = $porcentaje;
            }
        
            $this->datos['porcentajes'] = $porcentajes;
            $this->vistaApi($this->datos['porcentajes']);
        }


    }