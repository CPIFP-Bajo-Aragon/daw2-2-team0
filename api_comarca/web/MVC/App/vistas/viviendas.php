<?php require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ?>

<nav aria-label="breadcrumb">
    <ol class="breadcrumb mt-5 pt-3 justify-content-center">
        <li class="breadcrumb-item"><a href="<?php RUTA_URL?>/inicio" class="link-dark">Inicio</a></li>
        <li class="breadcrumb-item active" aria-current="page">Viviendas</li>
    </ol>
</nav>

<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="card mb-3">
                <div class="row g-0">
                    <?php foreach ($datos['imagenes'] as $imagen): ?>
                        <div class="col-md-3">
                            <img src="<?php echo $imagen->ruta_imagen?><?php echo $imagen->nombre_imagen?>.<?php echo $imagen->formato_imagen?>" class="card-img" alt="...">
                        </div>
                        <?php break ?>
                    <?php endforeach ?> 

                    <?php foreach($datos['viviendas'] as $vivienda): ?>
                        <div class="col-md-9">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $vivienda->titulo_oferta ?></h5>
                                <p class="card-text">Some quick example text to build on the card title and make up the bulk of the card's content.</p>
                                <a href="#" class="btn btn-primary">Go somewhere</a>
                            </div>
                        </div>
                    <?php endforeach?>
                </div>
            </div>
        </div>
    </div>
</div>


<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>