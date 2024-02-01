<?php
    class Login extends Controlador {

        private $loginModelo;

        public function __construct() {
            $this->loginModelo = $this->modelo('LoginModelo');
        }

        public function index() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $correo=trim($_POST['email']);
                $usuarioSesion = $this->loginModelo->loginEmail($correo);

                if(isset($usuarioSesion) && !empty($usuarioSesion)){
                    //Sesion::crearSesion($usuarioSesion);
                    Mailvalid::mailValid($usuarioSesion, "mensaje enviado", "mensaje enviado");

                }

            }
            $this->vista('login');

            

            // if (isset($_POST['enviar'])) {
            //     $correo=$_POST['email'];
            //     Mailvalid::mailValid($correo, "mensaje enviado", "mensaje enviado");
            // }
        }

    }