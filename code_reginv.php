<?php
    if(isset($_POST['btnregens'])){
        include 'conexion.php';

            $idens = $_POST['nmbidens'];
            $aula = $_POST['nmbaul'];
            $tipo = $_POST['cmbtip'];
            $estado = $_POST['cmbest'];
            $bloque = $_POST['cmbblo'];
            $registarens = mysqli_query($conexion, "INSERT INTO `enseres` (`id_aula`, `id_tipo`, `estado`, `id_bloque`) VALUES ('$aula', '$tipo', '$estado', '$bloque');") or die("Problemas De Inserción");

            echo "<script>alert('Registrado Con Exito');</script>";
            echo "<script>window.location='dashboard/pages/index.php?mod=adminv';</script>";
        }else{
            echo "<script>alert('Fallo en el registro');</script>";
            echo "<script>window.location='dashboard/pages/index.php?mod=adminv';</script>";
        }


?>

