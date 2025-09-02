<?php
        if(isset($_POST['btnRegis'])) {
            include "conexion.php";
            // Recibir clave
            $clave = $_POST['clave'];
            $comclave = $_POST['confirmClave'];
            // Validacion de contraseñas.
            if($clave == $comclave){
                // Encriptación de contraseña
                $pwEncrip = md5($clave);
                // Recibir datos
                $pnombre = $_POST['txtnom'];
                $snombre = $_POST['txtsnom'];
                $papellido = $_POST['txtape'];
                $sapellido = $_POST['txtsape'];
                $tipodoc = $_POST['cmbdoc'];
                $doc = $_POST['txtdoc'];
                $rol = $_POST['cmbrol'];
                $correo = $_POST['email'];
                $grupo = $_POST['nmbgrupo'];

                // Registrar
                $registro = mysqli_query($conexion, "INSERT INTO `usuarios` (`doc`, `tipo_doc`, `p_nombre`, `s_nombre`, `p_apellido`, `s_apellido`, `email`, `grupo`, `clave`, `id_rol`) VALUES ('$doc', '$tipodoc', '$pnombre', '$snombre', '$papellido', '$sapellido', '$correo', '$grupo', '$pwEncrip', '$rol');") or die ("No se pudo registrar el usuario.");
                echo "<script>alert('Usuario registrado exitosamente!')</script>";
                echo "<script>window.location='index.php'</script>";

            }else{
                echo "<script>alert('Las contraseñas no coinciden')</script>";
                echo "<script>window.location='registrar.php'</script>";
            }               
        }else{
            echo "<script>alert('Error')</script>";
            echo "<script>window.location='registrar.php'</script>";
        }
        ?>