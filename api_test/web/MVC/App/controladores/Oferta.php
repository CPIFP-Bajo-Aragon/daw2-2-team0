<?php
    class Oferta extends Controlador {

        private $ofertaModelo;
        private $loginModelo;
        
        public function __construct() {
            Sesion::iniciarSesion($this->datos);
            $this->ofertaModelo = $this->modelo('OfertaModelo');
            
            $this->loginModelo = $this->modelo('LoginModelo');
            $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
            if ($validar > 0) {
                $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
            }
            
        }
        
        public function index() {
            $municipios = $this->ofertaModelo->selectMunicipio();
            foreach ($municipios as $municipio) {
                $this->datos['municipio'][] = $municipio->nombre_municipio;
            }
            
            $this->vista('oferta', $this->datos);
        }
        
        public function negocios() {
            $negocios = $this->ofertaModelo->vermyNegocio($this->datos['usuarioSesion']->id_usuario);
            $this->datos['negocios']=$negocios;

            foreach ($negocios as $negocio) {
                $locales[] = $this->ofertaModelo->cogerLocal($negocio->local_id_inmueble);
            }
            $this->datos['local'] = $locales;

            foreach ($locales as $local) {
                $inmueble[] = $this->ofertaModelo->cogerInmueble($local->id_inmueble);
            }
            $this->datos['inmueble'] = $inmueble;
            $this->vistaApi($this->datos);
        }
         
        public function locales() {
           $locales = $this->ofertaModelo->myLocales($this->datos['usuarioSesion']->id_usuario);
           $this->datos['local'] = $negocios;
        }

        public function viviendas() {
            
        }

        public function insertnegocio(){
            $titulo_negocio = trim($_POST['title_negocio']);
            $coste_traspaso = trim($_POST['coste_traspaso_negocio']);
            $coste_mensual = trim($_POST['coste_mensual_negocio']);
            $motivo_traspaso = trim($_POST['motivo_traspaso_negocio']);
            $descripcion_negocio = trim($_POST['descripcion_negocio']);

            $nombre_local = trim($_POST['nombre_local']);
            $metros_local = trim($_POST['metros_cuadrados']);
            $precio_alquiler = trim($_POST['precio_alquiler_inmueble']);
            $direccion_inmueble = trim($_POST['direccion_inmueble']);
            $distrubucion_inmueble = trim($_POST['distribucion_inmueble']);
            $equipamiento_inmueble = trim($_POST['equipamiento_inmueble']);
            $municipio = trim($_POST['input_municipio']);
            $estado = trim($_POST['input_estado']);

            
            $this->ofertaModelo->insertarnegocio($this->datos['usuarioEntidad']->id_entidad, $titulo_negocio, $coste_traspaso, $coste_mensual, $motivo_traspaso, $descripcion_negocio, $nombre_local, $metros_local, $precio_alquiler, $direccion_inmueble, $distrubucion_inmueble, $equipamiento_inmueble, $municipio, $estado);
            Mailvalid::mailValid($this->datos['usuarioSesion']->correo_usuario, "Su negocio ha sido añadido de forma exitosa, espere a que un administrador lo valide para que pueda ser mostrado en la web.", "Negocio insertado!");
            redireccionar("/oferta");
        }

    
    }