<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Login</title>
</head>
<body>
<header>
    <div class="container-fluid d-flex justify-content-start flex-row">
        <a href="../" class="btn mt-3" role="button">
            <i class="bi bi-chevron-double-left"></i> Volver
        </a>
    </div>
</header>
<main class="d-flex h-75 flex-column justify-content-center">
    

    <form action="<?php RUTA_URL ?>" method="POST" class="needs-validation" >
        <div class="d-flex align-items-center mt-5">
            <div class="container-fluid col-10 col-md-8 col-lg-6 col-xl-4 p-5 text-center border rounded border-dark">
                <h1>LOGIN</h1>
                <div class="form-floating mt-5">
                    <input type="email" class="form-control" id="login_email" placeholder="Email" name="email" required>
                    <label for="login_email">Email</label>
                </div>
                <div class="form-floating mt-3 mb-3">
                    <input type="password" class="form-control" id="login_password" placeholder="Contraseña" name="pass" required>
                    <label for="login_password">Contraseña</label>
                </div>
                <div>
                    <a class="link-dark" href="<?php RUTA_URL ?>/remember"><p>¿Has olvidado la contraseña?</p></a>
                </div>
                <div>
                    <button class="btn btn-dark mt-3 mb-3" type="submit">ACCESO</button>
                </div>
                <?php if(isset($datos['error']) && $datos['error'] == 'error_1'):?>
                <div>
                    <p class="text-danger text-center">Usuario y/o contraseña incorrecta</p>
                </div>
                <?php endif ?>
                <div>
                    <a class="link-opacity-50-hover link-body-emphasis link-underline-opacity-0 link-underline-opacity-25-hover" href="<?php RUTA_URL ?>/registro"><p>REGISTRARSE</p></a>
                </div>
            </div>
        </div>
    </form>
</main>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>