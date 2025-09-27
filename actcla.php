<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (empty($_POST['token']) || empty($_POST['nueva']) || empty($_POST['confirmar'])) {
        die("Faltan datos en el formulario.");
    }
    $token = $_POST['token'];
    $nueva = $_POST['nueva'];
    $confirmar = $_POST['confirmar'];

    if ($nueva !== $confirmar) {
        die("Las contraseñas no coinciden.");
    }
    $stmt = $conexion->prepare("SELECT doc, expira FROM contras WHERE token = ? LIMIT 1");
    if (!$stmt) { die("Error prepare: " . $conexion->error); }
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $res = $stmt->get_result();

    if ($res->num_rows === 0) {
        die("Token inválido.");
    }
    $row = $res->fetch_assoc();
    if (!empty($row['expira']) && strtotime($row['expira']) < time()) {
        die("El enlace ha expirado.");
    }
    $doc = $row['doc'];
    $pwEncrip = md5($nueva);
    if (!$conexion->query("UPDATE usuarios SET clave = '$pwEncrip' WHERE doc = '$doc'")) {
        die("Error al actualizar: " . $conexion->error);
    }
    if (!$conexion->query("DELETE FROM contras WHERE token = '$token'")) {
        die("Error al borrar token: " . $conexion->error);
    }
    echo "<script>alert('Contraseña actualizada con éxito.'); window.location='index.php';</script>";
    exit;
} else {
    die("Acceso inválido.");
}