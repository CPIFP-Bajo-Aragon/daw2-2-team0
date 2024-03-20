<?php
    class OfertaModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        public function selectMunicipio(){

            $this->db->query("SELECT * FROM municipio");
            return $this->db->registros();
        }

        public function vermyNegocio($user){
            $this->db->query("SELECT * FROM usuario_entidad WHERE id_usuario = :user");
            $this->db->bind(":user", $user);
            $entidad = $this->db->registro();
            
            
            $this->db->query("SELECT * FROM oferta O
                                JOIN negocio N on O.id_negocio = N.id_negocio
                                WHERE O.id_entidad = :entidad");
            $this->db->bind(':entidad', $entidad->id_entidad);
            return $this->db->registros();
        }

        public function cogerLocal($local){
            $this->db->query("SELECT * FROM local WHERE id_local = :local");
            $this->db->bind(":local", $local);
            if ($this->db->rowCount() > 0) {
                return $this->db->registro();
            }
            
        }

        public function cogerInmueble($inmueble){
            $this->db->query("SELECT * FROM inmueble WHERE id_inmueble = :inmueble");
            $this->db->bind(":inmueble", $inmueble);
            return $this->db->registro();
        }

        public function myLocales($user){
            $this->db->query("SELECT * FROM usuario_entidad WHERE id_usuario = :user");
            $this->db->bind(":user", $user);
            $entidad = $this->db->registro();

            $this->db->query("SELECT * FROM oferta_inmueble O
                                JOIN local L ON O.id_inmueble = L.id_inmueble");
        }

        // public function insertarnegocio($entidad, $titulo_negocio, $coste_traspaso, $coste_mensual, $motivo_traspaso, $descripcion_negocio, $nombre_local, $metros_local, $precio_alquiler, $direccion_inmueble, $distrubucion_inmueble, $equipamiento_inmueble, $municipio, $estado){
        //     $this->db->query("INSERT INTO ");
        // }
        public function insertarnegocio($entidad, $titulo_negocio, $coste_traspaso, $coste_mensual, $motivo_traspaso, $descripcion_negocio, $nombre_local, $metros_local, $precio_alquiler, $direccion_inmueble, $distrubucion_inmueble, $equipamiento_inmueble, $municipio, $estado){
            $fecha_actual = date("Y-m-d");

            $fecha_hoy = new DateTime(); // Obtiene la fecha actual
            $fecha_hoy->modify('+1 month'); // Añade 1 mes a la fecha actual
            $fecha_fin = $fecha_hoy->format('Y-m-d'); // Formato de fecha: Año-Mes-Día
            
            
            $this->db->query("SELECT * FROM municipio WHERE nombre_municipio = :nombre_municipio");
            $this->db->bind(":nombre_municipio", $municipio);
            $muni = $this->db->registro();

            $this->db->query("SELECT * FROM estado WHERE estado = :estado");
            $this->db->bind(":estado", $estado);
            $esta = $this->db->registro();

           


            $this->db->query("INSERT INTO inmueble (metros_cuadrados_inmueble, distribucion_inmueble, direccion_inmueble, equipamiento_inmueble, id_municipio, id_estado)
                            VALUES (:metros_cuadrados, :distribucion, :direccion, :equipamiento, :municipio, :estado) ");
            
            $this->db->bind(':metros_cuadrados', $metros_local);
            $this->db->bind(':distribucion', $distrubucion_inmueble);
            $this->db->bind(':direccion', $direccion_inmueble);
            $this->db->bind(':equipamiento', $equipamiento_inmueble);
            $this->db->bind(':municipio', $muni->id_municipio);
            $this->db->bind(':estado', $esta->id_estado);

            $id_inmueble = $this->db->executeLastId();

            $this->db->query("INSERT INTO local (nombre_local, id_inmueble) VALUES (:nombre_local, :id_inmueble)");
            $this->db->bind(":nombre_local", $nombre_local);
            $this->db->bind(":id_inmueble", $id_inmueble);
            $id_local = $this->db->executeLastId();

            $this->db->query("INSERT INTO negocio (titulo_negocio, motivo_traspaso_negocio, coste_traspaso_negocio, coste_mensual_negocio, descripcion_negocio, local_id_inmueble) 
                                VALUES (:titulo, :motivo_traspaso, :coste_traspaso_negocio, :coste_mensual_negocio, :descripcion_negocio, :idlocal) ");
            $this->db->bind(":titulo", $titulo_negocio);
            $this->db->bind(":motivo_traspaso", $motivo_traspaso);
            $this->db->bind(":coste_traspaso_negocio", $coste_traspaso);
            if (empty($coste_mensual)) {
                $coste_mensual = null;
            }
            $this->db->bind(":coste_mensual_negocio", $coste_mensual);
            $this->db->bind(":descripcion_negocio", $descripcion_negocio);
            $this->db->bind(":idlocal", $id_local);

            $id_negocio = $this->db->executeLastId();

            $this->db->query("INSERT INTO oferta (titulo_oferta, fecha_inicio_oferta, fecha_fin_oferta, condiciones_oferta, fecha_publicacion_oferta, activo_oferta, id_entidad, id_negocio) 
                                VALUES (:titulo_oferta, :fecha_inicio, :fecha_fin,:condiciones_oferta, :fecha_publicacion, :activo, :entidad, :negocio)");

            $condicion ="Esta oferta se trata solamente de un alquiler de negocio";
            $this->db->bind(":titulo_oferta", $titulo_negocio);
            $this->db->bind(":fecha_inicio", $fecha_actual);
            $this->db->bind(":fecha_fin", $fecha_fin);
            $this->db->bind(":condiciones_oferta", $condicion);
            $this->db->bind(":fecha_publicacion", $fecha_actual);
            //TENDRÁ QUE SER VALIDADO POR EL ADMIN LA OFERTA
            $this->db->bind(":activo", 0);
            $this->db->bind(":entidad", $entidad);
            $this->db->bind(":negocio", $id_negocio);

            $id_oferta = $this->db->executeLastId();

            $this->db->query("INSERT INTO oferta_inmueble (id_oferta, id_inmueble, precio_inm, id_entidad) 
                                VALUES (:id_oferta, :id_inmueble, :precio_inmueble, :entidad)");
            $this->db->bind(":id_oferta", $id_oferta);
            $this->db->bind(":id_inmueble", $id_inmueble);
            $this->db->bind(":precio_inmueble", $coste_traspaso);
            $this->db->bind(":entidad", $entidad);
            $this->db->execute();
        }
    

    }