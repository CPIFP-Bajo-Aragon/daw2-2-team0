<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
<div class="w-100 d-flex justify-content-center pb-3">
    <button onclick="graficoEdades()" class="btn btn-secondary">Mostrar gráfico de edad</button>
</div>

<div>
    <canvas id="graficoEdades"></canvas>
</div>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>  