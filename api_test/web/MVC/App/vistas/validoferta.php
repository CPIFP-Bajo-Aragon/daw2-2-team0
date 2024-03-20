<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
<div class="container-fluid p-3" id="contenedor_cards">
    <div class="row">
        <?php
        foreach ($datos['ofertas_valid'] as $oferta_valid) {
        ?>
            <div class="col-lg-6 mb-3" id="oferta_card_sin_validar">
                <div class="card p-2">
                    <p class="mb-0"><?php echo "Título de la oferta: " . $oferta_valid->titulo_oferta; ?></p>
                    <p class="mb-0"><?php echo "Coste del traspaso: " . $oferta_valid->coste_traspaso_negocio . "€"; ?></p>
                    <p class="mb-0"><?php echo "Fecha de publicación: " . $oferta_valid->fecha_publicacion_oferta; ?></p>
                    <p class="mb-0"><?php echo "Condiciones de la oferta: " . $oferta_valid->condiciones_oferta; ?></p>
                    <p><?php echo "Descripción del negocio: " . $oferta_valid->condiciones_oferta; ?></p>
                    <form action="<?php RUTA_URL ?>/validoferta" method="post">
                        <input type="hidden" name="id_oferta" value="<?php echo $oferta_valid->id_oferta ?>">
                        <input type="submit" class="btn btn-success" value="Validar" name="ok">
                        <input type="submit" class="btn btn-danger" value="Eliminar" name="bad">
                    </form>
                </div>  
            </div>
        <?php
        }
        ?>  
    </div>
</div>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>