<?php
    
    use PHPMailer\PHPMailer\PHPMailer;
    use PHPMailer\PHPMailer\SMTP;
    use PHPMailer\PHPMailer\Exception;
class Mailvalid{

    public static function mailValid($correo, $mensaje, $asunto){
        
    require_once "PHPMailer/Exception.php";
    require_once "PHPMailer/PHPMailer.php";
    require_once "PHPMailer/SMTP.php";
    
    //Create an instance; passing `true` enables exceptions
    $mail = new PHPMailer(true);
    
    try {
        //Server settings
        $mail->SMTPDebug = 0;                      //Enable verbose debug output
        $mail->isSMTP();                                            //Send using SMTP
        $mail->Host       = 'smtp.gmail.com';                     //Set the SMTP server to send through
        $mail->SMTPAuth   = true;                                   //Enable SMTP authentication
        $mail->Username   = 'reto1adapta@gmail.com';                //SMTP username
        $mail->Password   = 'pdrf oxdb mluu igpt';                  //SMTP password
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_SMTPS;            //Enable implicit TLS encryption
        $mail->Port       = 465;                                    //TCP port to connect to; use 587 if you have set `SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS`
    
        //Recipients
        $mail->setFrom('reto1adapta@gmail.com','DBLO Coop');
        $mail->addAddress($correo);     //Add a recipient
    
        //Content
        $mail->isHTML(true);                                  //Set email format to HTML
        $mail->Subject = $asunto;
        $mail->Body    = $mensaje;
        $mail->AltBody = $asunto;
    
        $mail->send();
        // echo "mensaje enviado";
        
    } catch (Exception $e) {
        //echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
        echo "No se ha podido enviar el mensaje. Error: {$mail->ErrorInfo}";
    }
    }
}

?>