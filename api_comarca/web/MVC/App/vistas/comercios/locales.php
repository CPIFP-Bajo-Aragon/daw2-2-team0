<?php require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-5 pt-3 justify-content-center">
            <li class="breadcrumb-item"><a href=".." class="link-dark">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Comercios</li>
        </ol>
    </nav>

    <div class="botones_activos d-flex justify-content-center gap-1">
        <a href="<?php RUTA_URL ?>/comercios/negocios" class="boton_activo btn btn-secondary">Negocios</a>
        <a href="<?php RUTA_URL ?>/comercios/locales" class="boton_activo btn btn-dark active">Locales</a>
    </div>

    <?php $codigos_inmuebles_mostrados = array();
        foreach ($datos['locales'] as $local):
            if (!in_array($local->id_inmueble, $codigos_inmuebles_mostrados)):
                $codigos_inmuebles_mostrados[] = $local->id_inmueble;
    ?>

    <div class="container-fluid mt-3">
        <div class="card">
            <img class="card-img" src="<?php echo $local->ruta ?>. <?php echo $local->nombre_imagen ?>. <?php echo $local->formato_imagen ?>" alt="imagen_local">
            <div class="card-body">
                <h4><?php echo $local->precio_inm ?>€</h4>
                <p><?php echo $local->descripcion_inmueble ?></p>
                <button type="button" class="btn btn-secondary" data-toggle="modal" data-target="#modal_locales">Ver detalles</button>
            </div>
        </div>
    </div>

    <div class="modal fade" id="modal_locales">
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                
                <div class="modal-header">

                    <div class="carousel" id=imagen_local>
                        <!-- Indicators/dots -->
                        <div class="carousel-indicators">
                            <button type="button" data-target="#imagen_local" data-slide-to="0" class="active"></button>
                            <button type="button" data-target="#imagen_local" data-slide-to="1"></button>
                            <button type="button" data-target="#imagen_local" data-slide-to="2"></button>
                        </div>
                        
                        <!-- The slideshow/carousel -->
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                            <img src="" alt="imagen0" class="d-block" style="width:100%">
                            </div>
                            <div class="carousel-item">
                            <img src="" alt="imagen1" class="d-block" style="width:100%">
                            </div>
                            <div class="carousel-item">
                            <img src="" alt="imagen2" class="d-block" style="width:100%">
                            </div>
                        </div>
                        
                        <!-- Left and right controls/icons -->
                        <button class="carousel-control-prev" type="button" data-target="#imagen_local" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </button>
                        <button class="carousel-control-next" type="button" data-target="#imagen_local" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </button>
                    </div>
                    
                    <button type="button" class="btn-close" data-dismiss="modal"></button>
                </div>

                <div class="modal-body">
                    <h4><?php echo $local->precio_inm ?>€</h4>
                    <p><?php echo $local->descripcion_inmueble ?></p>
                </div>

                <div class="modal-footer">
                    <a href="<?php RUTA_URL ?>/login" class="boton_activo btn btn-secondary">Contactar</a>
                </div>

            </div>
        </div>
    </div>

    <?php endif; ?>
    <?php endforeach; ?> 

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>