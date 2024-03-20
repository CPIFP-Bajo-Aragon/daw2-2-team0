<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/headeriniciolog.php";
     ?>
     <?php
}else{
    require_once RUTA_APP. "/vistas/inc/headerinicio.php";
}

?>
    <div class="container-fluid d-flex flex-column flex-lg-row justify-content-center align-items-center h-100 w-100">
        
        <div class="col-lg-8 d-none d-lg-block d-flex justify-content-center">
            <div class="d-flex justify-content-center">
                <p class="fs-3 fw-bold text-center text-white w-75">Te damos la bienvenida al Catálogo Digital de la Comarca del Bajo Aragón, un espacio en el que podrás publicitar y consultar negocios que se traspasan y locales y viviendas en alquiler, así como explorar los servicios que existen en cada una de nuestros pueblos. La Comarca del Bajo Aragón tiene mucho que ofrecer. ¡Descúbrelo!</p>
            </div>
        </div>
        
        <div class="col-12 d-lg-none d-block d-flex justify-content-center">
            <div class="d-flex align-items-center">
                <p class="fs-3 fw-bold text-center text-white w-100 pe-4 ps-3 ms-3 me-3 pb-3"> La Comarca del Bajo Aragón tiene mucho que ofrecer. ¡Descúbrelo!</p>
            </div>
        </div>

        <div class="col-12 col-lg-4 d-flex flex-column align-items-center ps-3 pe-3">
            <a class="link w-50" href="<?php RUTA_URL ?>/comercios/negocios"><button type="button" class="btn btn-light btn-lg mt-2 w-100">COMERCIOS</button></a>
            <a class="link w-50" href="<?php RUTA_URL ?>/viviendas"><button type="button" class="btn btn-light btn-lg mt-2 w-100">VIVIENDAS</button></a>
            <a class="link w-50" href="<?php RUTA_URL ?>/servicios"><button type="button" class="btn btn-light btn-lg mt-2 w-100">SERVICIOS</button></a>
        </div>
        
    </div>

    <div id="cookie-notice"></div>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>