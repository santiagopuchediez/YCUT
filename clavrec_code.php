<?php
include 'conexion.php';

$email = trim(strtolower($_POST['email']));

if(empty($email)){
    echo "<script>alert('El correo no puede estar vacío');</script>";
    echo "<script>window.location='clavrec.php';</script>";
    exit;
}

$res = $conexion->query("SELECT doc FROM usuarios WHERE email='$email' LIMIT 1");
if($res->num_rows > 0){
    $row = $res->fetch_assoc();
    $doc = $row['doc'];
} else {
    echo "<script>alert('El correo no está registrado');</script>";
    echo "<script>window.location='clavrec.php';</script>";
    exit;
}

$token = bin2hex(random_bytes(16));
$expira = date("Y-m-d H:i:s", strtotime("+1 hour"));

include 'emailclavrec.php';

if($enviado){
    $conexion->query("INSERT INTO contras (email, doc, token, expira) 
    VALUES ('$email', '$doc', '$token', '$expira')");
    echo "<script>alert('Sigue el link enviado a tu email para reestablecer');</script>";
    echo "<script>window.location='clavrec.php';</script>";
}else{
    echo "<script>alert('Error al enviar el correo');</script>";
}
?>
