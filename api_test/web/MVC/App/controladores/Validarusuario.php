<?php
    class Validarusuario extends Controlador {

        private $validarusuarioModelo;
        private $loginModelo;
        public function __construct() {
            Sesion::iniciarSesion($this->datos);
            $this->validarusuarioModelo = $this->modelo('ValidarusuarioModelo');
            $this->loginModelo = $this->modelo('LoginModelo');
            $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
            $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
        }

        public function index($accion='') {
            if($accion == 'completado'){
                $this->datos['accion'] = "accion_completada";
            }
            $this->datos['usuarios'] = $this->validarusuarioModelo->mostrarusuarios();
            $this->vista("validarusuario", $this->datos);   
        }

        public function accionusuario() {
            if(isset($_POST['editar'])){
                $this->datos['usuario'] = $this->validarusuarioModelo->seleccionarUsuario($_POST['id_usuario']);
                $this->vista("editarusuario", $this->datos);
            }

            if(isset($_POST['borrar'])){
                $this->validarusuarioModelo->borrarUsuario($_POST['id_usuario']);
                redireccionar('/validarusuario/completado');
            }  
        }
 
        public function editarusuario() {
            $usuario = $_POST['id'];
            $correo_usuario = trim($_POST['email_user']);
            $fecha_nac = trim($_POST['fecha_user']);
            $nombre = trim($_POST['nombre_user']);
            $apellidos = trim($_POST['apellido_user']);
            $nif = trim($_POST['dni_user']);
            $telefono = trim($_POST['telefono_user']);
            $this->datos['usuarios'] = $this->validarusuarioModelo->editarUsuario($usuario, $correo_usuario, $fecha_nac, $nombre, $apellidos, $nif, $telefono);
            redireccionar('/validarusuario/completado');
        }
    }