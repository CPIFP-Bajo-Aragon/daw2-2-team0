<?php
    class Viviendas extends Controlador {

        private $viviendasModelo;
        private $loginModelo;

        public function __construct() {
            $this->viviendasModelo = $this->modelo('ViviendasModelo');
            if(Sesion::sesionCreada($this->datos)){
                $this->loginModelo = $this->modelo('LoginModelo');
                $validar = $this->loginModelo->comprobarentidad($this->datos['usuarioSesion']->id_usuario);
                if ($validar > 0) {
                    $this->datos['usuarioEntidad'] = $this->loginModelo->usuarioEntidad($this->datos['usuarioSesion']->id_usuario);
                }
            }
        }

        public function index($pagina='') {
            if($pagina != ''){
               
            }
            $this->datos["viviendas"] = $this->viviendasModelo->getViviendas();
            $this->datos["municipios"] = $this->viviendasModelo->getMunicipios();
            $this->datos["estados"] = $this->viviendasModelo->getEstados();
            $this->datos["entidades"] = $this->viviendasModelo->getEntidades();
            $this->datos["usuarios"] = $this->viviendasModelo->viviendasUsuario();

            $this->vista('viviendas',$this->datos);
        }
     
        // public function add_vivienda($error=0){
        //     if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        //         $vivienda = $_POST;
        //         if (!$_POST["titulo_oferta"] && !$_POST["condiciones_oferta"] && !$_POST["descripcion_oferta"] && !$_POST["fecha_inicio_oferta"] 
        //                 && !$_POST["fecha_fin_oferta"] && !$_POST["habitaciones_vivienda"] && !$_POST["caracteristicas_inmueble"] && !$_POST["distribucion_inmueble"]
        //                 && !$_POST["equipamiento_inmueble"]  && !$_POST["metros_cuadrados_inmueble"]  && !$_POST["selectTipoInmueble"]  
        //                 && !$_POST["selectMunicipio"]  && !$_POST["precio_inm"]  && !$_POST["direccion_inmueble"] && !$_POST["selectEntidad"] && !$_POST["selectEstado"]
        //                 && !$_POST["nombre_imagen"] && !$_POST["formato_imagen"]  && !$_POST["ruta_imagen"]){  

        //             redireccionar('/viviendas/1');
            
        //         } else {
        //             echo "Se ha producido un Error!!!";
        //         }
        //     } else {
        //         $this->datos["error"] = $error;
        //         $this->vista("viviendas",$this->datos);
        //     }
        // }


        public function addInmuebleAction($datos) {    
            $inmueble = new ViviendasModelo();
            $id_inmueble = $inmueble->addInmueble($datos);
            $this->addViviendaAction($id_inmueble, $datos);
        }
    
        public function addViviendaAction($id_inmueble, $datos) {    
            $inmueble = new ViviendasModelo();
            $id_vivienda = $inmueble->addVivienda($id_inmueble, $datos);
        
            $this->addOfertaAction($id_vivienda, $datos);
        }
    
        public function addOfertaAction($id_vivienda, $datos) {
            $inmueble = new ViviendaModelo();
            $id_oferta = $inmueble->addOferta($datos);
            $this->addOfertaInmuebleAction($id_oferta, $id_vivienda, $datos);
        }
    
        public function addOfertaInmuebleAction($id_oferta, $id_vivienda, $datos) {
    
            $inmueble = new ViviendaModelo();
            $inmueble->addOfertaInmueble($id_oferta, $id_vivienda, $datos);
            $this->addImagenAction($id_vivienda, $datos);
        }
    
        public function addImagenAction($id_vivienda, $datos) {
            $inmueble = new ViviendaModelo();
            $inmueble->addImagen($id_vivienda, $datos);
        }
    }