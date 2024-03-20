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
<body class="d-grid min-vh-100">


   <header>
       <nav class="navbar bg-white">
           <a href="<?php RUTA_URL ?>/inicio" class="btn" role="button">
               <i class="bi bi-chevron-double-left"></i> Volver
           </a>
       </nav> 
   </header>

   <?php
           $client = new Google_Client();
           $client->setClientId('741452706123-1m6gpsan271c5gn88paouqiebup0ud8o.apps.googleusercontent.com');
           $client->setClientSecret('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');
           $client->setRedirectUri('https://service1.retodaw.com/login/logingoogle/');
           $client->addScope("email");
           $client->addScope("profile");
           $client->setAccessType('offline');
           $client->setApprovalPrompt('force');
           $client->setIncludeGrantedScopes(true);
           $client->setPrompt('select_account consent');
           $client->setApprovalPrompt('force');
       ?>
       
   <main class="d-flex flex-column justify-content-center">
        <form action="<?php RUTA_URL ?>/login" method="POST" onsubmit="cookie_user()">
           <div class="d-flex align-items-center">
                <div class="container-fluid col-10 col-md-8 col-lg-6 col-xl-4 p-5 text-center border rounded border-dark">
                    <h1>LOGIN</h1>
                    <div class="form-floating mt-5">
                        <input type="email" class="form-control" id="login_email" placeholder="Email" name="email" required>
                        <label for="login_email">Email</label>
                    </div>
                    <div class="form-floating my-3">
                        <input type="password" class="form-control" id="login_password" placeholder="Contraseña" name="pass" required>
                        <label for="login_password">Contraseña</label>
                    </div>
                    <div>
                        <a class="link-dark" href="<?php RUTA_URL ?>/remember"><p>¿Has olvidado la contraseña?</p></a>
                    </div>
                    <div>
                       <button class="btn btn-dark my-3" type="submit">ACCESO</button>
                    </div>
                    <?php if(isset($datos['error']) && $datos['error'] == 'error_1'):?>
                    <div>
                       <p class="text-danger text-center">Usuario y/o contraseña incorrecta</p>
                    </div>
                  
                    <?php endif ?>
                    <div>
                       <a class="link-opacity-50-hover link-body-emphasis link-underline-opacity-0 link-underline-opacity-25-hover" href="<?php RUTA_URL ?>/registro"><p>REGISTRARSE</p></a>
                    </div>
                    <div class="w-100 d-flex justify-content-center pt-1">
                        <?php echo "<a href='".$client->createAuthUrl()."'><button type='button' class='login-with-google-btn'>Sign in with Google</button></a>";?>
                    </div>
                </div>
           </div>
       </form>
      
        
   </main>
   <?php
   if (isset($datos['registro']) && $datos['registro'] == "completado") {
       ?>
       <script>alert("El registro se ha completado correctamente")</script>
       <?php
   }
   ?>


<?php require_once RUTA_APP. "/vistas/inc/footer.php" ?>
