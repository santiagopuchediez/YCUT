<?php
session_start();
$user = $_SESSION['user'];
$rol = $_SESSION['rol'];

if (isset($_POST['btn_report'])) {
    include 'conexion.php';

    $responsable = $_POST['responsa'];
    $descrip = $_POST['descrip'];
    $aula = $_POST['aula'];
    $enser = $_POST['idEnser'];
    $bloque = $_POST['bloque'];
    $fecha = $_POST['date'];

    // Procesar imagen
    $rutaDestino = "uploads/";
    if (!file_exists($rutaDestino)) {
        mkdir($rutaDestino, 0777, true); // Crear carpeta si no existe
    }

    $nombreArchivo = $_FILES['evidencia']['name'];
    $tmpArchivo = $_FILES['evidencia']['tmp_name'];
    $rutaCompleta = $rutaDestino . time() . "_" . basename($nombreArchivo);

    if (move_uploaded_file($tmpArchivo, $rutaCompleta)) {
        // Insertar reporte con ruta de imagen
        $query = "INSERT INTO `reportes` (`responsable`, `desc`, `id_enser`, `evidencia`, `fecha_hora`, `usuarios_doc`, `id_rol`, `id_aula`, `id_bloque`) 
                  VALUES ('$responsable', '$descrip', '$enser', '$rutaCompleta', '$fecha', '$user', '$rol', '$aula', '$bloque')";
        
        $report = mysqli_query($conexion, $query) or die("No se pudo registrar el reporte.");

        echo "<script>alert('Reporte enviado con éxito ✅');</script>";
        echo "<script>window.location='dashboard/pages/index.php?mod=reportar.php';</script>";
    } else {
        echo "<script>alert('Error al subir la imagen ❌');</script>";
        echo "<script>window.location='dashboard/pages/index.php?mod=reportar.php';</script>";
    }
}
?>
