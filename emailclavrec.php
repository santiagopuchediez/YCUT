<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

require 'PHPMailer-master/src/Exception.php';
require 'PHPMailer-master/src/PHPMailer.php';
require 'PHPMailer-master/src/SMTP.php';


$mail = new PHPMailer(true);

try {
    $mail->isSMTP();
    $mail->Host       = 'smtp.gmail.com';
    $mail->SMTPAuth   = true;
    $mail->Username   = 'yocuidoytu@gmail.com';
    $mail->Password   = 'tddd tfsg gvfv rivk';
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
    $mail->Port       = 587;

    $mail->setFrom('yocuidoytu@gmail.com', 'YCUT');
    $mail->addAddress($email);

    $mail->isHTML(true);
    $mail->Subject = 'CORREO RECUPERACIÓN DE CONTRASEÑA';
    $mail->Body    = '<h1><a href="http://localhost/ycut/reset_clav.php?email=' . $email . '&token=' . $token . '">Link para reestablecer</a></h1>';
} catch (Exception $e) {
    echo "Error al enviar: {$mail->ErrorInfo}";
}

$enviado = false;
if ($mail->send()) {
    $enviado = true;
}
?>