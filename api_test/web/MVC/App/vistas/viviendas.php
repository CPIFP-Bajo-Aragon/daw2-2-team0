<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
<style>
    #buscadorDiv{
        display: none;
    }

    #botonClose{
        font-size: 1em;
    }

    #labelEstado{
        margin-right: 2px;
        white-space: nowrap;
    }

    #contenedor-card{
        padding-left:1%; 
        padding-right:1%;
    }

    #imagenContenedorCard{
        width: 100%;
    }

    #imgModal{
        width: 60%;
    }

    #paginacionPaginacion{
        justify-content: center;
    }
</style>

    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pt-3 justify-content-center">
            <li class="breadcrumb-item"><a href="<?php RUTA_URL ?>/inicio" class="link-dark">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Viviendas</li>
        </ol>
    </nav>

    <div class="container-fluid">
        <div class="filtros">
            <button type="button" id="mostrarBuscador" class="btn btn-secondary" onclick="toggleButtons(this)"><i class="bi bi-search"></i></button>
            <button type="button" id="filtroButton" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#filtroModal" onclick="toggleButtons(this)"><i class="bi bi-funnel-fill"></i> Filtros</button>

            <div id="buscadorDiv" class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2 mt-2">
                <input type="search" class="form-control" id="buscador" oninput="buscadorViviendas()" placeholder="Buscar...">
            </div>

            <!-- Ventana modal de los filtros (municipios y estado de la vivienda) -->
            <div class="modal fade" id="filtroModal" tabindex="-1" role="dialog" aria-labelledby="filtroModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-xl" role="document">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="filtroModalLabel">Filtros</h5>
                        <button id="botonClose" type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div id="filtrosDiv">
                            <div class="row">
                                <div class="col-lg-3 col-md-6 col-sm-6 col-12 mb-2 mt-2">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" value="todos" id="checkTodos" onchange="filtrarViviendas(); activarDesactivarTodos();">
                                        <label class="form-check-label" for="checkTodos">Todos los municipios</label>
                                    </div>
                                    <?php foreach ($datos['municipios'] as $municipio): ?>
                                        <div class="form-check">
                                            <input class="form-check-input" type="checkbox" value="<?php echo $municipio->id_municipio; ?>" id="check<?php echo $municipio->id_municipio; ?>" onchange="filtrarViviendas()">
                                            <label class="form-check-label" for="check<?php echo $municipio->id_municipio; ?>"><?php echo $municipio->nombre_municipio; ?></label>
                                        </div>
                                    <?php endforeach; ?>
                                </div>

                                <div class="col-lg-3 col-md-6 col-sm-12 col-12 offset-md-2 ">
                                    <label for="">ESTADOS:</label>
                                    <div class="btn-group" role="group">
                                        <?php foreach ($datos['estados'] as $estado): ?>
                                            <input type="checkbox" class="btn-check" id="estado_<?php echo $estado->id_estado; ?>" autocomplete="off" value="<?php echo $estado->id_estado; ?>" onchange="filtrarViviendasEstados()">
                                            <label id="labelEstado" class="btn btn-secondary" for="estado_<?php echo $estado->id_estado; ?>"><?php echo $estado->estado; ?></label>
                                            <?php endforeach; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="modal-footer justify-content-between">
                            <div>
                                <button type="button" class="btn btn-danger" onclick="eliminarFiltros()">Eliiminar Filtros</button>
                            </div>
                            <div>
                                <button type="button" class="btn btn-secondary close" data-bs-dismiss="modal" aria-label="Close">Cerrar</button>
                                <button type="button" class="btn btn-primary" onclick="aplicarFiltros()">Aplicar Filtros</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div id="viviendas-container">
            <?php
                //Ordena las cards por el precio (de más barato a más caro)
                // function comparePrices($a, $b) {
                //     return $a->precio_inm - $b->precio_inm;
                // }
                // usort($datos['viviendas'], 'comparePrices');
                
                // $id_inmuebles_mostrados = array();
                // foreach ($datos['viviendas'] as $vivienda):
                //     if (!in_array($vivienda->id_inmueble, $id_inmuebles_mostrados)):
                //         $id_inmuebles_mostrados[] = $vivienda->id_inmueble;

                $elementosPorPagina = 5;
                $paginaActual = isset($_GET['pagina']) ? $_GET['pagina'] : 1;
                $inicio = ($paginaActual - 1) * $elementosPorPagina;
                $fin = $inicio + $elementosPorPagina;
                $elementosAMostrar = array_slice($datos['viviendas'], $inicio, $elementosPorPagina);
                $totalPaginas = ceil(count($datos['viviendas']) / $elementosPorPagina);
                foreach ($elementosAMostrar as $vivienda):

            ?>

                <div class="row" id="contenedor-card" id="mi-contenedor-<?php echo $vivienda->id_inmueble; ?>" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado; ?>" >    
                    <div class="row mt-3" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado; ?>" >  
                        <div class="col-lg-12">
                            <div class="card mb-3">
                                <div class="d-flex row g-0" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado;?>"  data-tipo-vivienda="<?php echo strtolower($vivienda->tipo_vivienda); ?>">
                                    <div class="col-md-3">                        
                                        <img class="img" id="imagenContenedorCard" src="<?php echo $vivienda->ruta_imagen?><?php echo $vivienda->nombre_imagen?>.<?php echo $vivienda->formato_imagen?>" alt="">
                                    </div>
                                    <div class="col-md-9">
                                        <div class="card-body">
                                            <h5 class="modal-title" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado; ?>" id="exampleModalLabel"><?php echo $vivienda->titulo_oferta?></h5>
                                            <p class="card-text" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado; ?>" ><?php echo $vivienda->precio_inm ?> € /mes </p>
                                            <!-- <p class="card-text" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado; ?>"><?php echo $vivienda->descripcion_inmueble ?></p> -->
                                            <p class="card-text" data-municipio="<?php echo $vivienda->id_municipio; ?>" data-estado="<?php echo $vivienda->id_estado; ?>"><strong>Estado de la vivienda:</strong> <?php echo $vivienda->estado ?></p>

                                            <button type="button" class="btn btn-secondary" data-bs-toggle="modal" data-bs-target="#modal_<?php echo $vivienda->id_inmueble ?>">
                                                Ver detalles
                                            </button>

                                            <p class="card-text mt-4" data-fecha-inicio="<?php echo $vivienda->fecha_inicio_oferta; ?>"><em>Fecha de publicación: <?php echo date('d/m/Y', strtotime($vivienda->fecha_inicio_oferta)); ?></em></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>  
                </div>

                <div class="modal fade" id="modal_<?php echo $vivienda->id_inmueble ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel"><?php echo $vivienda->titulo_oferta?></h5> 
                                <!-- <h5 class="modal-title" id="exampleModalLabel"><?php echo $vivienda->tipo_vivienda?> en <?php echo $vivienda->nombre_municipio ?> de <?php echo $vivienda->metros_cuadrados_inmueble?> m2</h5> -->
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>                            
                            </div>
                            <div class="modal-body text-center">
                                <img class="img" id="imgModal" src="<?php echo $vivienda->ruta_imagen . $vivienda->nombre_imagen . '.' . $vivienda->formato_imagen ?>" alt=""/>
                            </div>
                            <div class="modal-body">     
                                <p class="mt-3"><strong>Tipo de inmueble:  </strong><?php echo $vivienda->tipo_vivienda?></p>
                                <p><strong>Precio alquiler: </strong><?php echo $vivienda->precio_inm ?> € /mes </p>
                                <p><strong>Localizado en </strong><?php echo $vivienda->direccion_inmueble ?> , <?php echo $vivienda->nombre_municipio?></p>
                                <!-- <p><strong>Descripción vivienda: </strong> <?php echo $vivienda->descripcion_inmueble ?></p> -->
                                <p><strong>Equipamiento: </strong><?php echo $vivienda->equipamiento_inmueble?></p>
                                <p><strong>Distrubución: </strong><?php echo $vivienda->distribucion_inmueble?></p>
                            </div>
                            <div class="modal-footer">    
                                <input type="submit" name="abrirChat" class="btn btn-secondary" id="abrirChat" value="Abrir Chat">         
                            </div>
                        </div>
                    </div>
                </div>
            <?php
               //endif;
               endforeach;
            //    echo "<div class='pagination d-flex' style='justify-content: center;'>";
            //    for ($i = 1; $i <= $totalPaginas; $i++) {
            //         echo "<nav aria-label='Page navigation'>";
            //         echo "<ul class='pagination'>";
            //         echo "<li class='page-item'><a class='page-link' href='".RUTA_URL."/viviendas/$i'>$i</a></li>";
            //         echo "</ul>";
            //         echo "</nav>";
            //     }
            //    echo "</div>";
                echo "<div class='pagination d-flex' id='paginacionPaginacion'>";
                for ($i = 1; $i <= $totalPaginas; $i++) {
                    echo "<nav aria-label='Page navigation'>";
                    echo "<ul class='pagination'>";
                    $claseActiva = ($i == $paginaActual) ? 'active' : '';
                    echo "<li class='page-item $claseActiva'><a class='page-link' href='".RUTA_URL."/viviendas/$i'>$i</a></li>";
                    echo "</ul>";
                    echo "</nav>";
                }
                echo "</div>";
            ?>

        </div> 
    </div>

    <script>
        // Función para que al clicar en el botón de la lupa, salga el buscador y se active.
        function toggleBuscador() {
            var buscadorDiv = document.getElementById('buscadorDiv');
            buscadorDiv.style.display = (buscadorDiv.style.display === 'none' || buscadorDiv.style.display === '') ? 'block' : 'none';

            if (buscadorDiv.style.display === 'block') {
                document.getElementById('buscador').focus();
            }
        }
        document.getElementById('mostrarBuscador').addEventListener('click', function() {
            toggleBuscador();
            document.getElementById('buscador').focus();
        });
        /////////////////////////////////////////////////////////////////////////////////////////////////////////
        // Función para eliminar todas las selecciones de la ventana modal de los filtros.
        function eliminarFiltros(){
            document.getElementById("checkTodos").checked = false;
            var checkboxes = document.querySelectorAll('input[type="checkbox"]');
            checkboxes.forEach(function(checkbox) {
                checkbox.checked = false;
            });
        }
    </script> 

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>  