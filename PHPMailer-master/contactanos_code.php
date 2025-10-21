<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

session_start();

require 'src/Exception.php';
require 'src/PHPMailer.php';
require 'src/SMTP.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $asunto = $_POST['txtasu'] ?? '';
    $mensaje = $_POST['txtmes'] ?? '';
    $correoUsuario = $_SESSION['email'] ?? '';

    $mail = new PHPMailer(true);

    try {
        // Configuración SMTP de Gmail (puedes usar otro proveedor)
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'yocuidoytu@gmail.com';
        $mail->Password = 'tddd tfsg gvfv rivk'; 
        $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;
        $mail->Port = 587;

        // Remitente y destinatario
        $mail->setFrom('yocuidoytu@gmail.com', 'YCUT Contacto');
        $mail->addAddress('yocuidoytu@gmail.com', 'YCUT');
        $mail->addReplyTo($correoUsuario, 'Usuario');

        // Contenido
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body    = nl2br("Mensaje enviado por: $correoUsuario<br><br>$mensaje");

        $mail->send();
        echo "<script>alert('Mensaje enviado correctamente'); window.history.back();</script>";
    } catch (Exception $e) {
        echo "<script>alert('Error al enviar el mensaje: {$mail->ErrorInfo}'); window.history.back();</script>";
    }
}
?>
