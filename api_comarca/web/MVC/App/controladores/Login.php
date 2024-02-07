<?php
    class Login extends Controlador {

        private $loginModelo;

        public function __construct() {
            $this->loginModelo = $this->modelo('LoginModelo');
            
        }

        public function index() {
            if($_SERVER['REQUEST_METHOD'] == 'POST'){
                
                ///SOLO FUNCIONA CON CONSTRASEÑAS ENCRIPTADAS EN ESTE CASO alba123

                $correo = trim($_POST['email']);
                $pass = trim($_POST['pass']);
                $usuarioSesion = $this->loginModelo->loginEmail($correo);
                  
                if(isset($usuarioSesion) && !empty($usuarioSesion) ){
                    $hashedPassword = $usuarioSesion -> contrasena;
                    if (password_verify($pass, $hashedPassword)) {
                        Sesion::crearSesion($usuarioSesion);
                        redireccionar('/');
                    }else{
                        $this->datos['error'] = "error_1";
                        $this->vista('login', $this->datos);
                    }
                    
                } else {
                    $this->datos['error'] = "error_1";
                    $this->vista('login', $this->datos);
                    
                }
            }else{
                $this->vista('login');
            }
           
        }

    }




//ENVIAR CORREO FUNCION CUANDO AL HABER UNA PETICION POST ENVIA CORREO AL EMAIL COGIDO EN EL INPUT 'EMAIL'
    //if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     $correo=trim($_POST['email']);
        //     $usuarioSesion = $this->loginModelo->loginEmail($correo);

        //     if(isset($usuarioSesion) && !empty($usuarioSesion)){
        //         //Sesion::crearSesion($usuarioSesion);
        //         Mailvalid::mailValid($usuarioSesion->correo, "mensaje enviado", "mensaje enviado");

        //     }

        // }