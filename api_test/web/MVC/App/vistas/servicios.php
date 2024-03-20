<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb mt-3 justify-content-center">
            <li class="breadcrumb-item"><a href="<?php RUTA_URL ?>/inicio" class="link-dark">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Servicios</li>
        </ol>
    </nav>

    <div class="pt-3 pb-4">
        <h1 class="text-center">SERVICIOS</h1>
    </div>

    <div class="ps-3 pb-4">
        <select id="input_select" class="form-select w-75" onchange="maps(this), servicios(this)">
            <?php foreach ($datos['pueblos'] as $poblacion) { ?>
                <option value="<?php echo $poblacion->nombre_municipio?>"><?php echo $poblacion->nombre_municipio?></option>
            <?php } ?>
        </select>
    </div>

    <div id="contain_map">
        <div id="mapa"></div>
    </div>

    <div id="contain_tabla_servicios" class="pt-4 pb-3">
        <table id="tabla_servicios"></table>
    </div>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>