<?php
    class Perfil extends Controlador {

        private $perfilModelo;
        private $loginModelo;
        
        public function __construct() {
            Sesion::iniciarSesion($this->datos);
            $this->perfilModelo = $this->modelo('PerfilModelo');
           
            $this->loginModelo = $this->modelo('LoginModelo');
            $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
            if ($validar > 0) {
                $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
            }
            
        }

        public function index() {
            $usuario = $this->datos['usuarioSesion']->id_usuario;
            $this->datos['documentos']=$this->perfilModelo->docUser($usuario);
            $this->vista('perfil',$this->datos);
        }
        
        
        public function docs() {
            if (isset($_POST['new_document'])) {
            
                $uploadDirectory = "/srv/www/api/MVC/public/doc_users/".$this->datos['usuarioSesion']->id_usuario . DIRECTORY_SEPARATOR; // Directorio de destino
            
                if (!file_exists($uploadDirectory)) {
                    mkdir($uploadDirectory, 0777, true); // Crea el directorio si no existe
                    
                }
                
                foreach ($_FILES['uploads']['name'] as $indice => $nombre_final) {
                    $archivo_temporal = $_FILES['uploads']['tmp_name'][$indice];
        
                    $nombre_base = pathinfo($nombre_final, PATHINFO_FILENAME); // Obtener el nombre base del archivo
                    $extension = pathinfo($nombre_final, PATHINFO_EXTENSION); // Obtener la extensión del archivo
                    
                    $destino = $uploadDirectory . $nombre_final;
                    
                    // Verificar si el archivo ya existe
                    $contador = 1;
                    while (file_exists($destino)) {
                        $nombre_cambio = $nombre_base . '(' . $contador . ')';
                        $nombre_final = $nombre_cambio .'.'. $extension; // Añadir un número al nombre del archivo
                        $destino = $uploadDirectory . $nombre_final;
                        $contador++;
                    }
                
                    if (move_uploaded_file($archivo_temporal, $destino)) {
                        //echo "¡Archivo subido con éxito como: " . $nombre_final . "<br>";

                        //INSERTO EN LA BASE DE DATOS, (NOMBRE, TIPO, RUTA, IDUSER)
                        if($contador!=1){
                            $this->perfilModelo->docInsert($nombre_cambio, $extension, $this->datos['usuarioSesion']->id_usuario);
                        }else{
                            $this->perfilModelo->docInsert($nombre_base, $extension, $this->datos['usuarioSesion']->id_usuario);
                        }
                        
                        redireccionar('/perfil');
                    } else {
                        echo "Error al subir el archivo " . $nombre_final . "<br>";
                    }
                }
            }
            if (isset($_POST['remove_file'])) {
                //BORRA EL DIRECTORIO Y LO QUE HAY DENTRO
                $removeFile = "/srv/www/api/MVC/public/doc_users/".$this->datos['usuarioSesion']->id_usuario . DIRECTORY_SEPARATOR . $_POST['name_file'].".".$_POST['type_file'];
                //$archivos = array_diff(scandir($uploadDirectory), array('.', '..'));

                // foreach ($archivos as $archivo) {
                //     $ruta = $uploadDirectory . DIRECTORY_SEPARATOR . $archivo;
                if(@unlink($removeFile)){
                // }
                    $this->perfilModelo->docRemove($_POST['name_file']);
                    redireccionar('/perfil');
                }else{
                    redireccionar('/perfil');
                }
            } 
        }
    }