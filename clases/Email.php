<?php

namespace Clases;

use PHPMailer\PHPMailer\PHPMailer;

class Email {

    public $email;
    public $nombre;
    public $token;

    public function __construct($email, $nombre, $token) {
        $this->email = $email;
        $this->nombre = $nombre;
        $this->token = $token;

    }

    public function enviarConfirmacion() {
       // Crear el objeto de email
       $mail = new PHPMailer();
       $mail->isSMTP(); // protocolo de envio de email
       $mail->Host = $_ENV['EMAIL_HOST'];
       $mail->SMTPAuth = true;
       $mail->Port = $_ENV['EMAIL_PORT'];
       $mail->Username = $_ENV['EMAIL_USER'];
       $mail->Password = $_ENV['EMAIL_PASS'];


        $mail->setFrom('cuentas@appsalon.com');
        $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
        $mail->Subject = 'Confirma tu cuenta';

        // Utilizar html
        $mail->isHTML(TRUE);
        $mail->CharSet = 'UTF-8';

        $contenido = "<html>";  
        $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Cuenta creada correctamente, presiona el siguiente enlace</p>";
        // el sirve para unirlo a lo anterior
        $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/public/confirmar-cuenta?token=" . $this->token . "'>Confirmar Cuenta </a> </p>";
        $contenido .= "<p>Si no has solicitado esta cuenta, ignora el mensaje</p>";
        $contenido .= "</html>";

        $mail->Body = $contenido;

        // Enviar el email
        $mail->send();
    }

    public function enviarInstrucciones() {

           // Crear el objeto de email
           $mail = new PHPMailer();
           $mail->isSMTP(); // protocolo de envio de email
           $mail->Host = $_ENV['EMAIL_HOST'];
           $mail->SMTPAuth = true;
           $mail->Port = $_ENV['EMAIL_PORT'];
           $mail->Username = $_ENV['EMAIL_USER'];
           $mail->Password = $_ENV['EMAIL_PASS'];
   
           $mail->setFrom('cuentas@appsalon.com');
           $mail->addAddress('cuentas@appsalon.com', 'AppSalon.com');
           $mail->Subject = 'Restablecer password';
   
           // Utilizar html
           $mail->isHTML(TRUE);
           $mail->CharSet = 'UTF-8';
   
           $contenido = "<html>";  
           $contenido .= "<p><strong>Hola " . $this->nombre . "</strong> Has solicitado restablecer tu password, presiona el siguiente enlace</p>";
           // el sirve para unirlo a lo anterior
           $contenido .= "<p>Presiona aquí: <a href='" . $_ENV['APP_URL'] . "/public/recuperar?token=" . $this->token . "'>Restablecer Password </a> </p>";
           $contenido .= "<p>Si no has solicitado esta cuenta, ignora el mensaje</p>";
           $contenido .= "</html>";
   
           $mail->Body = $contenido;
   
           // Enviar el email
           $mail->send();

    }


}