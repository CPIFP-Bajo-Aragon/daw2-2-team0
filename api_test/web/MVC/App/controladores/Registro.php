<?php
    class Registro extends Controlador {

        private $registroModelo;

        public function __construct() {
            
        }

        public function index(){
            if ($_SERVER['REQUEST_METHOD'] == 'POST') {
                $this->registroModelo = $this->modelo('RegistroModelo');
                
                $dni = trim($_POST['dni_user']);

                //VALIDAR NIF
                $nif = strtoupper(trim($dni));
    
                // Comprobar el formato del DNI
                if (!preg_match('/^[0-9]{8}[A-Z]$/', $dni)) {
                    $this->datos['error'] = "error_insert";
                    $this->vista('registro', $this->datos);
                    exit;
                }
                
                // Extraer número y letra del DNI
                $numero = substr($dni, 0, 8);
                $numeroint = intval($numero);
                $letra = substr($dni, -1);
                
                // Calcular la letra correspondiente al número
                $letras_validas = 'TRWAGMYFPDXBNJZSQVHLCKE';
                $posicion = $numeroint % 23;
                $letra_correcta = $letras_validas[$posicion];
                
                // Comparar la letra calculada con la letra proporcionada
                if ($letra != $letra_correcta) {
                    $this->datos['error'] = "error_insert";
                    $this->vista('registro', $this->datos);
                    exit;
                }
                
                // Si pasa todas las validaciones, el DNI es válido
            ///////////////////////////////////////////////////////////////////////////////////////////
                $nom_user = trim($_POST['nombre_user']);
                if(!preg_match('/^[A-Za-z]+$/', $nom_user)){
                    $this->datos['error'] = "error_insert";
                    $this->vista('registro', $this->datos);
                    exit;
                }
                $apellido_user = trim($_POST['apellido_user']);
                if(!preg_match('/^[A-Za-z]+$/', $apellido_user)){
                    $this->datos['error'] = "error_insert";
                    $this->vista('registro', $this->datos);
                    exit;
                }
                $email_user = trim($_POST['email_user']);
                //RECOMENDABLE ENCRIPTAR CONTRASEÑA EN EL MODELO YA QUE TRABAJAS DIRECTAMENTE EN LA BD
                $pass = trim($_POST['pass_user']);
                $fecha_nac_user = trim($_POST['fecha_user']);
                $telefono_user = trim($_POST['telefono_user']);

                if(!preg_match('/^[0-9]+$/', $telefono_user)){
                    $this->datos['error'] = "error_insert";
                    $this->vista('registro', $this->datos);
                    exit;
                }
                
                //SE VERIFICA EL USUARIO
                $valid_insert_user = $this->registroModelo->comprobarUser($nif, $email_user);
                if ($valid_insert_user == 0) {
                   //SE INSERTA USUARIO
                    $this->registroModelo->registroUser($nif, $nom_user, $apellido_user, $email_user, $pass, $fecha_nac_user, $telefono_user);

                    if ($_POST['entidad_usuario'] != 0 && (isset($_POST['nombre_entidad']))) {
                        $nom_entidad = trim($_POST['nombre_entidad']);
                        $cif_entidad = trim($_POST['cif_entidad']);
                      
                        $dir_entidad = trim($_POST['direccion_entidad']);
                        $numero_entidad = trim($_POST['numero_telefono_entidad']);
                        if(!preg_match('/^[0-9]+$/', $numero_entidad)){
                            $this->datos['error'] = "error_insert";
                            $this->vista('registro', $this->datos);
                            exit;
                        }
                        $correo_entidad = trim($_POST['correo_entidad']);

                        //SE VERIFICA LA ENTIDAD E INSERTA
                        $valid_insert_entidad = $this->registroModelo->comprobarEntidad($nif, $nom_entidad, $cif_entidad, $dir_entidad, $numero_entidad, $correo_entidad);
                        if ($valid_insert_entidad == 1) {
                            //SE ASIGNA ROL A USUARIO CON ENTIDAD
                            $validar_insert = $this->registroModelo->rolUserEntidad($nif, $cif_entidad);
                            if ($validar_insert != 1) {
                                $this->datos['error'] = "error_insert";
                                $this->vista('registro', $this->datos);
                            }else{
                                redireccionar('/');
                            }
                        }else{
                            //ERROR AL INSERTAR LA ENTIDAD
                            $this->datos['error'] = "error_insert";
                            $this->vista('registro', $this->datos);
                        }
                    }else{
                        //SE ASIGNA ROL A USUARIO SIN ENTIDAD
                        $validar_insert = $this->registroModelo->rolUser($nif);
                        if ($validar_insert != 1) {
                            $this->datos['error'] = "error_insert";
                            $this->vista('registro', $this->datos);
                        }else{
                            redireccionar('/');
                        }
                        
                    }

                    
                }else{
                    $this->datos['error'] = "error_insert";
                    $this->vista('registro', $this->datos);
                }
                
            }else{
                $this->vista('registro');
            }
            
        }

           

    }