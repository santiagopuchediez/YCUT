
<?php
    if(isset($_POST['btnregaul'])){
        include 'conexion.php';

        $docres = $_POST['idresaul'];
        $numaul = $_POST['numaul'];
        $ubiaul = $_POST['bloaul'];
        $carresaul = $_POST['carresaul'];

            $registarblo = mysqli_query($conexion, "INSERT INTO `aulas` (`doc`, `id_aula`, `id_bloque`, `id_rol`) VALUES ('$docres', '$numaul', '$ubiaul', '$carresaul')") or die("Problemas al registrar");

        echo "<script>alert('Registrado Con Exito');</script>";
        echo "<script>window.location='/YCUT/dashboard/pages/index.php?mod=gestionar_salon';</script>";

    } else {
        echo "<script>alert('Fallo en el registro');</script>";
        echo "<script>window.location='/YCUT/dashboard/pages/index.php?mod=gestionar_salon';</script>";
    }
?>
