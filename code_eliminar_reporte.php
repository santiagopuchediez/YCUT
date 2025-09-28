<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);

    $query = "DELETE FROM reportes WHERE id_reporte = $id";
    mysqli_query($conexion, $query);

    echo "<script>alert('Reporte eliminado con éxito ✅');</script>";
    echo "<script>window.location='dashboard/pages/index.php?mod=reportesver.php';</script>";
    exit;
}
?>