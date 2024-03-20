<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
<div class="w-100 d-flex justify-content-center pb-3">
    <a href="<?php echo RUTA_URL ?>/Registro" class="d-flex justify-content-center link-underline link-underline-opacity-0"><button class="w-100 py-2 btn btn-secondary">Añadir usuarios</button></a>
</div>

<?php
    if (isset($datos['accion']) && $datos['accion'] == 'accion_completada') {
        ?>
        <div class="alert alert-success d-flex justify-content-center align-items-center" role="alert">
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
            <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
            <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
            </svg>
            <div class="ps-3">
                La acción ha sido realizada correctamente
            </div>
        </div>
        <?php
    }
?>

<div class="container-fluid p-3" id="contenedor_cards">
        <div class="row">
            <?php
            foreach ($datos['usuarios'] as $usuario) {
            ?>
                <div class="col-lg-6 mb-3" id="oferta_card_sin_validar">
                    <div class="card p-2">
                        <p class="mb-0"><?php echo "Nombre: " . $usuario->nombre_usuario; ?></p>
                        <p class="mb-0"><?php echo "Apellidos: " . $usuario->apellidos_usuario; ?></p>
                        <p class="mb-0"><?php echo "NIF: " . $usuario->nif; ?></p>
                        <p class="mb-0"><?php echo "Correo: " . $usuario->correo_usuario; ?></p>
                        <form action="<?php RUTA_URL ?>/validarusuario/accionusuario" method="post" >
                            <input type="hidden" name="id_usuario" value="<?php echo $usuario->id_usuario ?>">
                            <input type="submit" class="btn btn-primary" value="Editar" name="editar">
                            <input type="submit" class="btn btn-danger" value="Eliminar" name="borrar" onclick="return confirm('¿Seguro que quiere borrar este usuario?')">
                        </form>
                    </div>  
                </div>
            <?php
            }
            ?>  
        </div>
    </div>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>