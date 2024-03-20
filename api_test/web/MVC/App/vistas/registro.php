<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/icon.ico">
    <link rel="stylesheet" type="text/css" href="css/estilos.css">
    <title>Registro</title>
</head>
<body class="d-grid min-vh-100">

    <header>
        <nav class="navbar bg-white">
            <a href="<?php RUTA_URL ?>/login" class="btn" role="button">
                <i class="bi bi-chevron-double-left"></i> Volver
            </a>
        </nav>  
    </header>

    <main class="d-flex h-100 flex-column justify-content-center">
        <?php
            if (isset($datos['error']) && $datos['error'] == 'error_insert') {
                ?>
                <div class="alert alert-danger d-flex justify-content-center align-items-center" role="alert">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-exclamation-triangle" viewBox="0 0 16 16">
                    <path d="M7.938 2.016A.13.13 0 0 1 8.002 2a.13.13 0 0 1 .063.016.15.15 0 0 1 .054.057l6.857 11.667c.036.06.035.124.002.183a.2.2 0 0 1-.054.06.1.1 0 0 1-.066.017H1.146a.1.1 0 0 1-.066-.017.2.2 0 0 1-.054-.06.18.18 0 0 1 .002-.183L7.884 2.073a.15.15 0 0 1 .054-.057m1.044-.45a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767z"/>
                    <path d="M7.002 12a1 1 0 1 1 2 0 1 1 0 0 1-2 0M7.1 5.995a.905.905 0 1 1 1.8 0l-.35 3.507a.552.552 0 0 1-1.1 0z"/>
                    </svg>
                    <div class="ps-3">
                        ERROR EN EL REGISTRO, COMPRUEBE LOS DATOS INTRODUCIDOS
                    </div>
                </div>
                <?php
            }
        ?>

        <form action="<?php RUTA_URL ?>" method="POST" class="needs-validation" id="registro_formulario" onsubmit="return validar_dni() && validar_nif()">
            <div class="d-flex align-items-center mt-3 mb-3">
                <div class="container-fluid col-10 col-xl-8 p-5 text-center border rounded border-dark">
                    <h1>REGISTRO</h1>
                    <div class="row form-row mt-5">
                        <!---EMAIL USUARIO -->
                        <div class="form-group col-md-4 d-flex align-items-start flex-column">
                        
                            <label for="email_user">Email:</label>
                            <input type="email" class="form-control" id="email_user" placeholder="ejemplo@gmail.com" name="email_user" pattern="([a-zA-Z0-9_\-\.]+)@([a-zA-Z0-9_\-\.]+)\.([a-zA-Z]{2,5})$" required>
                            
                        </div>
                        <!---PASS USUARIO -->
                        <div class="form-group col-md-4 d-flex align-items-start flex-column">
                            <label for="pass_user">Contraseña:</label>
                            <div class="d-flex flex-row input-group">
                                <input type="password" class="form-control" id="pass_user" name="pass_user"  aria-describedby="togglePassword" required>
                                <button class="btn btn-outline-secondary" type="button" id="togglePassword" onclick="cambiopass()">
                                    <img src="img/ciego.png" alt="" class="input-icon" id="img_mostrarpass">
                                </button>
                            </div>
                        </div>
                        <!---FECHA USUARIO -->
                        <div class="form-group col-md-4 d-flex align-items-start flex-column">
                        
                            <label for="fecha_user">Fecha nacimiento:</label>
                            <input type="date" class="form-control" id="fecha_user" name="fecha_user" required>
                            
                        </div>
                    </div>

                    <div class="row form-row mt-5 mb-3">
                        <!---NOMBRE USUARIO -->
                        <div class="form-group col-md-3 d-flex align-items-start flex-column">
                        
                            <label for="nombre_user">Nombre:</label>
                            <input type="text" class="form-control" id="nombre_user" placeholder="Nombre" name="nombre_user" pattern="[A-Za-z]+" required>
                            
                        </div>
                        <!---APELLIDO USUARIO -->
                        <div class="form-group col-md-3 d-flex align-items-start flex-column">
                        
                            <label for="apellido_user">Apellido:</label>
                            <input type="text" class="form-control" id="apellido_user" placeholder="Apellido" name="apellido_user" pattern="[A-Za-z]+" required>
                            
                        </div>
                        <!---DNI USUARIO -->
                        <div class="form-group col-md-3 d-flex align-items-start flex-column">
                        
                            <label for="dni_user">DNI:</label>
                            <input type="text" class="form-control" id="dni_user" placeholder="DNI" name="dni_user" pattern="[0-9]{8}[A-Z]" required>
                            
                        </div>
                        <!---TELEFONO USUARIO -->
                        <div class="form-group col-md-3 d-flex align-items-start flex-column">
                        
                            <label for="telefono_user">Telefono:</label>
                            <input type="text" class="form-control" id="telefono_user" placeholder="Telefono" name="telefono_user" pattern="[0-9]{9}" required>
                            
                        </div>
                    </div>

                    <label for="floatingSelect" class="mt-3 pt-3">Propietario y/o socio de una empresa</label>
                    <div class="row justify-content-center">
                        <!---CHECK BOX -->
                        <div class="form-floating pt-1 mb-3 col-md-4">
                        
                            <select class="form-select" aria-label="Default select example" name="entidad_usuario" id="floatingSelect" onclick="añadirformulario()">
                                <option value="0" selected>NINGUNA</option>
                                <option value="1">EMPRESA</option>
                                <option value="2">EMPRESA INDIVIDUAL</option>
                            </select>

                            <label for="floatingSelect" class="ms-2">Entidad a la que pertenece</label>

                        </div>
                    </div>
                    <div id="ampliacion_registro">

                    </div>
                    
                    <div>
                        <button class="btn btn-dark mt-3 mb-3" type="submit">REGISTRARSE</button>
                    </div>
                    
                </div>
            </div>
        </form>
    </main>

<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>