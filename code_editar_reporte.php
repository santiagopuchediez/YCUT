<?php
include 'conexion.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = intval($_POST['id']);
    $responsable = mysqli_real_escape_string($conexion, $_POST['responsable']);
    $desc = mysqli_real_escape_string($conexion, $_POST['desc']);

    $query = "UPDATE reportes SET responsable='$responsable', `desc`='$desc' WHERE id_reporte=$id";
    mysqli_query($conexion, $query);

    echo "<script>alert('Reporte editado con éxito');</script>";
    echo "<script>window.location='dashboard/pages/index.php?mod=reportesver';</script>";
    exit;
}