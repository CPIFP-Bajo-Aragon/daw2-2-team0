<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
    <title>BAJO ARAGON</title>
</head>
<body id="inicio" class="d-flex flex-column min-vh-100">
    <nav class="navbar bg-white navbar-expand-lg fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo RUTA_URL ?>"><img class="img" src="/img/logoBA.png" alt="logoBA" style="width: 180px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="<?php echo RUTA_URL ?>/perfil">Mi perfil</a>
                    </li>
                    <?php
                    
                        //SI ES UN USUARIO NORMAL TIENE CHAT, DOCUMENTACION Y SUS OFERTAS
                        if ($datos['usuarioSesion']->id_rol == 1 || $datos['usuarioSesion']->id_rol == 2 || $datos['usuarioSesion']->id_rol == 3 ) {
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Chat</a>
                                </li>
                            <?php
                            if($datos['usuarioSesion']->id_rol == 2){
                                if (isset($datos['usuarioEntidad'])) {
                            ?>
                            
                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RUTA_URL ?>/Oferta">Mis Ofertas</a>
                                </li>
                            
                            <?php
                                }
                            }
                            if($datos['usuarioSesion']->id_rol == 1){
                            ?>
                                <li class="nav-item">
                                    <a class="nav-link" href="#">Reportes</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RUTA_URL ?>/Graficos">Estadisticas</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RUTA_URL ?>/validarusuario">Usuarios</a>
                                </li>

                                <li class="nav-item">
                                    <a class="nav-link" href="<?php echo RUTA_URL ?>/validoferta">Ofertas</a>
                                </li>
                            <?php
                            if ($datos['usuarioSesion']->id_rol == 3) {
                                ?>
                                <li class="nav-item">
                                        <a class="nav-link" href="#">Noticias</a>
                                </li>
                                <?php
                            }
                            
                        }
                    }
                    ?>
                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="<?php echo RUTA_URL ?>/inicio/logout" onclick="return confirm('¿Estás seguro qué quieres cerrar sesión?') && out_cookie()">Cerrar Sesión</a>
                    </li>

                    <li class="nav-item dropdown d-none d-lg-block">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/perfil">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/inicio/logout" onclick="return confirm('¿Estás seguro qué quieres cerrar sesión?') && out_cookie()">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
