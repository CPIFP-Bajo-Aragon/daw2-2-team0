<?php require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-5 pt-3 justify-content-center">
            <li class="breadcrumb-item"><a href=".." class="link-dark">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Comercios</li>
        </ol>
    </nav>

    <div class="botones_activos d-flex justify-content-center gap-1">
        <a href="<?php RUTA_URL ?>/comercios/negocios" class="boton_activo btn btn-dark active">Negocios</a>
        <a href="<?php RUTA_URL ?>/comercios/locales" class="boton_activo btn btn-secondary">Locales</a>
    </div>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js"></script>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>