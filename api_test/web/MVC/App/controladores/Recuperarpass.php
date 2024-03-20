<!--En desarrollo-->
<?php

class Recuperarpass extends Controlador {

    public function __construct() {

    }

    public function index() {
        $this->vista('recuperar_pass');
    }

    public function enviarCorreoRecuperacion() {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $correo = $_POST['correo'];

            //Validar el correo electrónico y verificar si existe en base de datos y genera token

            $token = bin2hex(random_bytes(32)); //Genera token único
            $enlace = "https://service1.retodaw.com/restablecer.php?token=$token";

            $mail = new PHPMailer(true);

            $mail->addAddress($correo);
            $mail->Subject = 'Restablecimiento de contraseña';
            $mail->Body = "Haga clic en el siguiente enlace para restablecer su contraseña: $enlace";

            if ($mail->send()) {
                $this->vista('mensaje_exito');
            } else {
                $this->vista('mensaje_error');
            }
        } else {
            redireccionar('/inicio');
        }
    }
}
