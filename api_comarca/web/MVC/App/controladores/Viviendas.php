<?php
    class Viviendas extends Controlador {

        private $viviendasModelo;

        public function __construct() {
            $this->viviendasModelo = $this->modelo('ViviendasModelo');
        }

        public function index() {
            $this->datos["viviendas"] = $this->viviendasModelo->getViviendas();
            $this->datos["imagenes"] = $this->viviendasModelo->getImagenes();

            $this->vista('viviendas',$this->datos);
        }

        //    $this->datos["asesoriasActivas"] = $this->asesoriaModelo->getAsesoriasActivas();
        //     foreach($this->datos["asesoriasActivas"] as $asesoria){
        //         $asesoria->acciones=$this->asesoriaModelo->getAccionesAsesoria($asesoria->id_asesoria);
        //     }
    }