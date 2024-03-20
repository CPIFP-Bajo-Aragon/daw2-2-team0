<?php if (isset($datos['usuarioSesion']) && !empty($datos['usuarioSesion'])) {
     require_once RUTA_APP. "/vistas/inc/header_logueado.php" ;
}else{
    require_once RUTA_APP. "/vistas/inc/header_no_logueado.php" ;
}
?>
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb pt-3 justify-content-center">
            <li class="breadcrumb-item"><a href="<?php RUTA_URL ?>/inicio" class="link-dark">Inicio</a></li>
            <li class="breadcrumb-item active" aria-current="page">Mi Perfil</li>
        </ol>
    </nav>

    <h3 class="text-center pt-3">Mi Perfil</h3>

    <div class="container mt-3 pt-3">
        <div class="row justify-content-center">
            <div class="col-12 col-md-6 col-lg-6 col-xl-6">
                <div class="card border-secondary">
                    <h3 class="card-header bg-secondary text-white text-center">Información del usuario</h3>
                    <div class="card-body">
                        <h2 class="card-title text-center"><?php echo ($datos['usuarioSesion']->nombre_usuario)?> <?php echo ($datos['usuarioSesion']->apellidos_usuario)?></h2>   
                        <div class="row mt-3 pt-3">
                            <div class="col-md-6">
                                <p class="card-text"><strong>NIF:</strong> <?php echo ($datos['usuarioSesion']->nif)?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Email:</strong> <?php echo ($datos['usuarioSesion']->correo_usuario)?></p>
                            </div>
                        </div>
                        <div class="row mt-3 pt-3">
                            <div class="col-md-6">
                                <p class="card-text"><strong>Fecha Nacimiento:</strong> <?php echo date('d-m-Y', strtotime($datos['usuarioSesion']->fecha_nacimiento_usuario)) ?></p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text"><strong>Teléfono:</strong> <?php echo ($datos['usuarioSesion']->telefono_usuario)?></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12 col-md-6 col-lg-6 col-xl-6 px-3 mt-3 mt-md-0 mb-3">
                <div class="card border-secondary">
                    <h3 class="card-header bg-secondary text-white text-center">Documentos</h3>
                    <div class="card-body">
                        <?php
                            if (isset($datos['documentos']) && !empty($datos['documentos'])) {
                                $conteo_docs = 0;
                                foreach ($datos['documentos'] as $doc) {
                                    if ($conteo_docs % 3 == 0) {
                                        // Inicia una nueva fila cada tres documentos
                                        echo '<div class="row">';
                                    }
                        ?>
                                    <div class="col-md-4">
                                        <a href="<?php echo $doc->ruta_archivo.$doc->nombre_documento.'.'.$doc->tipo_documento?>" download="" class="text-decoration-none text-primary"><?php echo $doc->nombre_documento.'.'.$doc->tipo_documento ?></a>
                                        <form action="<?php RUTA_URL ?>/perfil/docs" method="post">
                                            <input type="hidden" name="name_file" value="<?php echo $doc->nombre_documento ?>">
                                            <input type="hidden" name="type_file" value="<?php echo $doc->tipo_documento ?>">
                                            <!-- <input type="submit" value="BORRAR" name="remove_file"> -->
                                            <input type="submit" value="BORRAR" name="remove_file" class="btn btn-secondary btn-sm">
                                        </form>
                                    </div>
                        <?php
                                    $conteo_docs++;
                                    if ($conteo_docs % 3 == 0) {
                                        // Cierra la fila después de tres documentos
                                        echo '</div>';
                                    }
                                }
                                // Si el número total de documentos no es divisible por 3, cierra la última fila
                                if ($conteo_docs % 3 != 0) {
                                    echo '</div>';
                                }
                            } else {
                        ?>
                                <div class="col text-center">
                                    <p class="fw-bold">TODAVÍA NO HA SUBIDO NINGÚN DOCUMENTO</p>
                                </div>
                        <?php
                            }
                        ?>
                        <form action="<?php RUTA_URL ?>/perfil/docs" method="post" enctype="multipart/form-data">
                            <div class="input-group mb-3 w-100 d-flex justify-content-center">
                                <!-- <input type="file" id="input-upload" name="uploads[]" multiple="multiple"> -->
                                <div class="input-group pt-3">
                                    <input type="file" id="input-upload" name="uploads[]" multiple="multiple" class="form-control" aria-describedby="inputGroupFileAddon">
                                </div>

                                <div id="upload_files" class="w-100 mt-3 pt-3" ondrop="dropHandler(event);" ondragover="dragOverHandler(event);">
                                    ARRASTRE AQUÍ SU ARCHIVO...
                                </div>

                                <!-- <input type="submit" class="col-2 mt-4" value="AÑADIR" name="new_document"> -->
                                <input type="submit" class="btn btn-secondary mt-4 rounded" value="AÑADIR" name="new_document">
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>  