<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="css/estilos.css">
    <title>Header Admin</title>
</head>
<body id="inicio">
    <nav class="navbar navbar-expand-lg bg-body-tertiary fixed-top">
        <div class="container-fluid">
            <a class="navbar-brand" href="<?php echo RUTA_URL ?>"><img class="img mt-1" src="/img/logoBA.png" alt="logoBA" style="width: 180px;"></a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a class="nav-link d-lg-none" href="#">Mi perfil</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Chat</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Reportes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Usuarios</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertantes</a>
                    </li>

                    <li class="nav-item">
                        <a class="nav-link" href="#">Ofertas</a>
                    </li>

                    <li class="nav-item d-lg-none">
                        <a class="nav-link" href="<?php echo RUTA_URL ?>/inicio/logout">Cerrar Sesión</a>
                    </li>

                    <li class="nav-item dropdown d-none d-md-block">
                        <a class="nav-link dropdown-toggle" role="button" data-bs-toggle="dropdown" aria-expanded="false"><i class="bi bi-person"></i></a>
                        <ul class="dropdown-menu dropdown-menu-end">
                            <li><a class="dropdown-item" href="#">Mi perfil</a></li>
                            <li><a class="dropdown-item" href="<?php echo RUTA_URL ?>/inicio/logout" onclick="return confirm('Estas seguro que quieres cerrar sesion')">Cerrar Sesión</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
