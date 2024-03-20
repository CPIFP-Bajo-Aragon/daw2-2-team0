<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pt-3 justify-content-center">
            <li class="breadcrumb-item"><a href="<?php RUTA_URL ?>/inicio" class="link-dark">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mis Ofertas</li>
        </ol>
    </nav>

<!-- <div class="row  col-12">
        <div class="d-inline-flex justify-content-around pt-5">
            <div class="d-flex flex-column flex-md-row justify-content-end gap-1 w-50">
                <button type="button" class="btn btn-dark" onclick="abrir_misnegocios()">Negocios</button>
                <button type="button" class="btn btn-dark" onclick="abrir_mislocales()">Locales</button>
                <button type="button" class="btn btn-dark" onclick="abrir_misviviendas()">Viviendas</button>
            </div>
            <select id="opcion_añadir" class="form-select w-25" aria-label="Default select example" onchange="selectOption(this,<?php echo htmlspecialchars(json_encode($this->datos['municipio']), ENT_QUOTES); ?>)" onclick="mantener_add()">
                <option value="" disabled selected>Añadir</option>
                <option value="Negocio">Negocio</option>
                <option value="Local">Local</option>
                <option value="Vivienda">Vivienda</option>
            </select>
        </div>
    </div> -->

    <div class="container">
        <div class="row gx-0 gy-0 align-items-center">
            <div class="col-6 col-md-6 col-lg-6 col-xl-6 d-inline-flex justify-content-around pt-3">
                <div class="d-flex flex-column flex-md-row justify-content-end gap-1 w-50">
                    <button type="button" class="btn btn-dark" onclick="abrir_misnegocios()">Negocios</button>
                    <button type="button" class="btn btn-dark" onclick="abrir_mislocales()">Locales</button>
                    <button type="button" class="btn btn-dark" onclick="abrir_misviviendas()">Viviendas</button>
                </div>
            </div>
            <div class="col-6 col-md-6 col-lg-6 col-xl-6 d-inline-flex justify-content-around pt-3">
                <select id="opcion_añadir" class="form-select form-select-md w-50" aria-label="Default select example" onchange="selectOption(this,<?php echo htmlspecialchars(json_encode($this->datos['municipio']), ENT_QUOTES); ?>)" onclick="mantener_add()">
                    <option value="" disabled selected>Añadir</option>
                    <option value="Negocio">Negocio</option>
                    <option value="Local">Local</option>
                    <option value="Vivienda">Vivienda</option>
                </select>
            </div>
        </div>
    </div>

    
    <!-- Cards en versión móvil (imagen arriba), ordenador (imagen lateral izquierda) y versión de pantalla extragrande (las cards de ofertas no ocupan todo el ancho de la pantalla) -->
    <div class="container-fluid p-3" id="contenedor_myofertas">
        <div class="row">
            <div class="col-xxl-10" id="card_myofertas">
            <!-- Aquí se crea la card de ofertas --> 
            </div>
        </div>
    </div>

    <!-- Botones de Paginación -->
    <div class="d-flex justify-content-center p-3 mt-auto">
        <div class="d-flex gap-2" id="contenedor_paginacion">
        <!-- Aquí se crean los botones de paginación --> 
        </div>
    </div>
        


<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>  