<?php
    if(isset($_POST['btnregblo'])){
        include 'conexion.php';

            $idblo = $_POST['idblo'];
            $carblo = $_POST['carblo'];
            $carual = $_POST['caraul'];
            $registarblo = mysqli_query($conexion, "INSERT INTO `bloques` (`id_bloque`, `cardinalidad`, `cardinalidad_aulas`) VALUES ('$idblo', '$carblo', '$carual');") or die("Problemas al registrar");

            echo "<script>alert('Registrado Con Exito');</script>";
            echo "<script>window.location='dashboard/pages/index.php?mod=crear_bloques';</script>";
        }else{
            echo "<script>alert('Fallo en el registro');</script>";
            echo "<script>window.location='dashboard/pages/index.php?mod=crear_bloques';</script>";
        }


?>
