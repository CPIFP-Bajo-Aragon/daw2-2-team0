<?php
   class Login extends Controlador {

       private $loginModelo;

       public function __construct() {
           $this->loginModelo = $this->modelo('LoginModelo');
           // Sesion::crearSesiongmail();
       }


       public function index() {
           if($_SERVER['REQUEST_METHOD'] == 'POST'){
              
               ///SOLO FUNCIONA CON CONSTRASEÑAS ENCRIPTADAS EN ESTE CASO alba123


               $correo = trim($_POST['email']);
               $pass = trim($_POST['pass']);
               $usuarioSesion = $this->loginModelo->loginEmail($correo);
                
               if(isset($usuarioSesion) && !empty($usuarioSesion) ){
                   $hashedPassword = $usuarioSesion -> contrasena_usuario;
                   if (password_verify($pass, $hashedPassword)) {
                       Sesion::crearSesion($usuarioSesion);
                       redireccionar('/');
                   }else{
                       $this->datos['error'] = "error_1";
                       $this->vista('login', $this->datos);
                   }
                  
               } else {
                   $this->datos['error'] = "error_1";
                   $this->vista('login', $this->datos);
                  
               }
           }else{
               $this->vista('login',$this->datos);
           }
         
       }


       public function logingoogle($usuario){
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
          
           $parte = explode("&", $usuario);
           $parte2 = explode("=", $parte[0]);
           //print_r($parte2[1]);

           //$_GET['code'] = basename($_SERVER['REQUEST_URI']);
           //print_r($_GET['code']);

           //if (isset($_GET['code'])) {
               $authCode = urldecode($parte2[1]);
               $token = $client->fetchAccessTokenWithAuthCode($authCode);
               // echo "<br><br><br><br>";
               // print_r($token);
               $client->setAccessToken($token['access_token']);
          
               // Obtenemos la información del usuario
               $google_oauth = new Google_Service_Oauth2($client);
               $google_account_info = $google_oauth->userinfo->get();
               //var_dump($google_account_info);
               $email = $google_account_info->email;
               $name = $google_account_info->name;
               $id = $google_account_info->id;
               // Aquí puedes manejar la información del usuario como desees
               echo $email .'<br>';
               echo $name.'<br>';
               echo $id;
               // Puedes almacenar la información del usuario en sesión, base de datos, etc.
           //  } else {
           //     // Si no hay un código de autorización, redirige al usuario a la página de inicio de sesión de Google
           //     $authUrl = $client->createAuthUrl();
           //     header('location:' . filter_var($authUrl, FILTER_SANITIZE_URL));
           // }
          
       }

   }


//ENVIAR CORREO FUNCION CUANDO AL HABER UNA PETICION POST ENVIA CORREO AL EMAIL COGIDO EN EL INPUT 'EMAIL'
    //if($_SERVER['REQUEST_METHOD'] == 'POST'){
        //     $correo=trim($_POST['email']);
        //     $usuarioSesion = $this->loginModelo->loginEmail($correo);

        //     if(isset($usuarioSesion) && !empty($usuarioSesion)){
        //         //Sesion::crearSesion($usuarioSesion);
        //         Mailvalid::mailValid($usuarioSesion->correo, "mensaje enviado", "mensaje enviado");

        //     }

        // }