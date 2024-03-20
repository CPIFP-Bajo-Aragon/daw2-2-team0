<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>

<!-- Migas de pan (Inicio/Comercios/Locales) -->
<nav aria-label="breadcrumb">
    <ol class="breadcrumb justify-content-center p-1">
        <li class="breadcrumb-item"><a href="<?php echo RUTA_URL; ?>/" class="link-dark">Inicio</a></li>
        <li class="breadcrumb-item">Comercios</li>
        <li class="breadcrumb-item active" aria-current="page">Negocios</li>
    </ol>
</nav>

<!-- Botones Negocios y Locales (activo) -->
<div class="botones_activos d-flex justify-content-center gap-2 pb-2">
    <a href="<?php echo RUTA_URL; ?>/comercios/negocios" class="boton_activo btn btn-dark active">Negocios</a>
    <a href="<?php echo RUTA_URL; ?>/comercios/locales" class="boton_activo btn btn-secondary">Locales</a>
</div>

<!-- Barra de búsqueda, Botón Filtrar, Botón Precio y Botón Fecha en versión móvil (dos filas) y ordenador (una fila) -->
<div class="d-flex flex-column flex-sm-row justify-content-between p-3">
    <div class="mb-3 mb-sm-0" id="container_buscador">
    <!-- Aquí se crea el input Buscar -->    
    </div>
    <div class="d-flex justify-content-between gap-2">
        <!-- El botón Filtrar desaparece en pantalla extragrande -->
        <div class="d-xxl-none" id="container_boton_filtrar">
        <!-- Aquí se crea el botón Filtrar -->  
        </div>
        <div class="d-flex justify-content-between gap-2" id="container_botones_ordenar">
        <!-- Aquí se crean los botones Precio y Fecha --> 
        </div>
    </div>
</div>

<!-- Cards en versión móvil (imagen arriba), ordenador (imagen lateral izquierda) y versión de pantalla extragrande (las cards de ofertas no ocupan todo el ancho de la pantalla) -->
<div class="container-fluid p-3" id="contenedor_cards">
    <div class="row">
        <div class="col-xxl-10" id="oferta_card">
        <!-- Aquí se crea la card de ofertas --> 
        </div>
        <!-- A la derecha de las cards de ofertas se sitúa una card de filtros -->
        <div class="d-none d-xxl-block col-xxl-2" id="filtros_card">
        <!-- Aquí se crea la card de filtros --> 
        </div>
    </div>
</div>

<!-- Botones de Paginación -->
<div class="d-flex justify-content-center p-3 mt-auto">
    <div class="d-flex gap-2" id="contenedor_paginacion">
    <!-- Aquí se crean los botones de paginación --> 
    </div>
</div>

<?php require_once RUTA_APP . "/vistas/inc/footer.php"; ?>

<script>
    window.addEventListener("resize", function() {
        crear_card_oferta(<?php echo json_encode($datos['ofertas']); ?>);

        paginar_ofertas(<?php echo json_encode($datos['ofertas']); ?>);

        let inputBuscar = document.getElementById('inputBuscar');
        inputBuscar.value = '';

        let buttonPrecio = document.getElementById('ordenarPrecioBtn');
        buttonPrecio.textContent = 'Precio ↑↓';

        let buttonFecha = document.getElementById('ordenarFechaBtn');
        buttonFecha.textContent = 'Fecha ↑↓';
    });

    crear_card_oferta(<?php echo json_encode($datos['ofertas']); ?>);

    crear_card_filtros(<?php echo json_encode($datos['ofertas']); ?>);

    crear_barra_buscar(<?php echo json_encode($datos['ofertas']); ?>);

    crear_boton_filtros(<?php echo json_encode($datos['ofertas']); ?>);

    crear_botones_ordenar(<?php echo json_encode($datos['ofertas']); ?>);

    paginar_ofertas(<?php echo json_encode($datos['ofertas']); ?>);
</script>