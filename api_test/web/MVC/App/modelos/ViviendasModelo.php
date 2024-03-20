<?php

    class ViviendasModelo {
        private $db;

        public function __construct(){
            $this->db = new Base;
        }

        // public function registrosViviendas(){
        //     $result = $this->db->query("SELECT COUNT(*) as num_registros FROM oferta o JOIN oferta_inmueble oi ON o.id_oferta = oi.id_oferta 
        //                                         JOIN inmueble i ON oi.id_inmueble = i.id_inmueble 
        //                                         JOIN vivienda v ON i.id_inmueble = v.id_inmueble 
        //                                         JOIN imagen im ON i.id_inmueble = im.id_inmueble
        //                                         JOIN municipio m ON i.id_municipio = m.id_municipio 
        //                                         JOIN estado e ON i.id_estado = e.id_estado");

        //     $num_registros = $result->rowCount()->num_registros;
        // }

        public function viviendasUsuario(){
            $this->db->query("SELECT * FROM oferta o JOIN oferta_inmueble oi ON o.id_oferta = oi.id_oferta 
                                        JOIN inmueble i ON oi.id_inmueble = i.id_inmueble 
                                        JOIN vivienda v ON i.id_inmueble = v.id_inmueble 
                                        JOIN imagen im ON i.id_inmueble = im.id_inmueble
                                        JOIN municipio m on i.id_municipio = m.id_municipio 
                                        JOIN estado e on i.id_estado = e.id_estado
                                        JOIN usuario_oferta user on o.id_oferta = user.id_oferta");
                                        
            return $this->db->registros();
        }





        //Mostrar todas las viviendas
        public function getViviendas() {
            $this->db->query("SELECT * FROM oferta o JOIN oferta_inmueble oi ON o.id_oferta = oi.id_oferta 
                                        JOIN inmueble i ON oi.id_inmueble = i.id_inmueble 
                                        JOIN vivienda v ON i.id_inmueble = v.id_inmueble 
                                        JOIN imagen im ON i.id_inmueble = im.id_inmueble
                                        JOIN municipio m on i.id_municipio = m.id_municipio 
                                        JOIN estado e on i.id_estado = e.id_estado
                                        ORDER BY o.fecha_inicio_oferta DESC");

            return $this->db->registros();
        }
        
        //Mostrar todos los municipios
        public function getMunicipios(){
            $this->db->query("SELECT * FROM municipio");
            
            return $this->db->registros();
        }

        //Mostrar todos los estados
        public function getEstados(){
            $this->db->query("SELECT * FROM estado");

            return $this->db->registros();
        }

        //Mostrar todas las entidades
        public function getEntidades(){
            $this->db->query("SELECT * FROM entidad");

            return $this->db->registros();
        }

        //Inserción en la tabla inmueble
        public function addInmueble(){
            $this->db->query("INSERT INTO `inmueble` (`metros_cuadrados_inmueble`, `descripcion_inmueble`, `distribucion_inmueble`,`direccion_inmueble`,
                                                      `caracteristicas_inmueble`, `equipamiento_inmueble`, `id_municipio`, `id_estado`)
                                    VALUES (:metros_cuadrados_inmueble, :descripcion_inmueble, :distribucion_inmueble, :direccion_inmueble,
                                            :caracteristicas_inmueble, :equipamiento_inmueble, :id_municipio, :id_estado) ");
                                        
            $this->db->bind(':metros_cuadrados_imueble', trim($datos["metros_cuadrados_inmueble"]));
            $this->db->bind(':descripcion_inmueble', trim($datos["descripcion_inmueble"]));
            $this->db->bind(':distribucion_inmueble', trim($datos["distribucion_inmueble"]));
            $this->db->bind(':direccion_inmueble', trim($datos["direccion_inmueble"]));
            $this->db->bind(':caracteristicas_inmueble', trim($datos["caracteristicas_inmueble"]));
            $this->db->bind(':equipamiento_inmueble', trim($datos["equipamiento_inmueble"]));
            $this->db->bind(':id_municipio', trim($datos["selectMunicipio"]));
            $this->db->bind(':id_estado', trim($datos["selectEstado"]));
                
            $this->db->execute();
            return $this->db->executeLastId();
        }

        //Inserción en la tabla vivienda
        public function addVienda($id_inmueble){
            $this->db->query("INSERT INTO `vivienda` (`habitaciones_vivienda`, `tipo_vivienda`, `id_inmueble`)
                                VALUES (:habitaciones_vivienda, :tipo_vivienda, :id_inmueble)");

            $this->db->bind(':habitaciones_vivienda', trim($datos["habitaciones_vivienda"]));
            $this->db->bind(':tipo_vivienda', trim($datos["selectTipoInmueble"]));
            $this->db->bind(':id_inmueble', $id_inmueble);

            $this->db->execute();
            return $this->db->executeLastId();
        }

        //Inserción en la tabla oferta
        public function addOferta(){
            $this->db->query("INSERT INTO 'oferta' (`titulo_oferta`, `fecha_inicio_oferta`, `fecha_fin_oferta`, `condiciones_oferta`, `descripcion_oferta`, 
                                                        `fecha_publicacion_oferta`, `id_entidad`)
                                VALUES (:titulo_oferta, :fecha_inicio_oferta, :fecha_fin_oferta, :condiciones_oferta, :descripcion_oferta, NOW(), :id_entidad)");
            
            $this->db->bind(':titulo_oferta', trim($datos["titulo_oferta"]));
            $this->db->bind(':fecha_inicio_oferta', trim($datos["fecha_inicio_oferta"]));
            $this->db->bind(':fecha_fin_oferta', trim($datos["fecha_fin_oferta"]));
            $this->db->bind(':condiciones_oferta', trim($datos["condiciones_oferta"]));
            $this->db->bind(':descripcion_oferta', trim($datos["descripcion_oferta"]));
            $this->db->bind(':id_entidad', trim($datos["selectEntidad"]));

            $this->db->execute();
            return $this->db->executeLastId();
        }

        //Insercion en la tabla oferta_inmueble
        public function addOfertaInmueble($id_oferta, $id_inmueble){
            $this->db->query("INSERT INTO `oferta_inmueble` (`id_oferta`, `id_inmueble`, `precio_inm`) 
                                VALUES (:id_oferta, :id_inmueble, :precio_inm)");

            $this->db->bind(':id_oferta', $id_oferta);
            $this->db->bind(':id_inmueble', $id_inmueble);
            $this->db->bind(':precio_inm', trim($datos["precio_inm"]));

            $this->db->execute();
            return $this->db->executeLastId();
        }

        //Inserción en la tabla imagen
        public function addImagen($id_inmueble){
            $this->db->query("INSERT INTO `imagen` (`nombre_imagen`, `formato_imagen`, `ruta_imagen`, `id_inmueble`)
                                VALUES (:nombre_imagen, :formato_imagen, :ruta_imagen, :id_inmueble)");
            
            $this->db->bind(':nombre_imagen', trim($datos["nombre_imagen"]));
            $this->db->bind(':formato_imagen', trim($datos["formato_imagen"]));
            $this->db->bind(':ruta_imagen', trim($datos["ruta_imagen"]));
            $this->db->bind(':id_inmueble', $id_inmueble);

            $this->db->execute();
        }
    }

