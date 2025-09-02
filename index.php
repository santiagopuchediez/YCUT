<?php
session_start();
if(isset($_SESSION['user'])){
    echo "<script>window.location='dashboard/pages/index.php';</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilos.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>INICIO DE SESIÓN</title>
</head>
<body background="img/bg1.jpg">
<?php
            if(isset($_POST['btningresar'])){
                
                include "conexion.php";
                
                $pass = $_POST['txtpass'];
                $user = $_POST['txtdoc'];
                

                if(!empty($pass) and !empty($user)){
                   
                    $eclave = md5($pass);
                    
                    $consulta = mysqli_query($conexion, "SELECT * FROM usuarios where doc=$user and clave='$eclave'")or die($conexion."Problemas en la consulta");
                $num = mysqli_num_rows($consulta);
                if($num > 0){

                
                   
                while($fila=mysqli_fetch_array($consulta)){
                    $_SESSION['user'] = $fila['doc'];
                    $_SESSION['nom'] = $fila['p_nombre'];
                    $_SESSION['ape'] = $fila['p_apellido'];
                }
                    echo "<script>window.location='dashboard/pages/index.php'</script>";
                }else{
                   
                    echo "<script>alert('Usuario o contraseña erroneos')</script>";
                   
                    echo "<script>window.location='index.php'</script>";
                }
            }else{
                echo "<font color = 'red'>Rellene todos los campos</font>";
            }
        }
        ?>
        <div class="login">
        <center>
        <div class="logo">
        <img src="img/logo.png" width="100%" height="110%">
        <h1 class="logo-text">YCUT</h1>
        </div>
        <br>
        <form action="index.php" method="post">
            <h1 class="txt1">INICIO DE SESIÓN</h1>
        <br><br>
        <label class="txt1">USUARIO</label>
        <br> <br>
        <input class="inp1" type="text" size="60" name="txtdoc" placeholder="Documento">
        <br> <br>
        <input class="inp1" type="password" name="txtpass" placeholder="Contraseña">
        <br><br>
        <label class="txt1" for="Recordar">
            <input type="checkbox" name="recordar" value="si" checked>
            Recordarme
        </label>
        <br><br>
        <button class="boton" type="submit" name="btningresar">INGRESAR</button>
        <br><br>
        <br> <br>
        </form>
        <a href="" class="txt1">¿Olvidaste tu contraseña?</a> | <a href="registrar.php"  class="txt1">¿No tienes cuenta?</a>
        </center>
        <br><br>
        </div>
        <br>

    
</body>
</html>