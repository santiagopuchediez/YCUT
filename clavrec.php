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
    <link rel="icon" type="image/x-icon" href="IMG/logoycutsf.png">
    <title>RECUPERAR CONTRASEÑA</title>
</head>
<body background="img/bg1.jpg">
        <div class="login">
        <center>
        <div class="logo">
        <img src="IMG/logoycutsf.png" width="100%" height="110%">
        <h1 class="logo-text">YCUT</h1>
        </div>
        <br>
        <form action="clavrec_code.php" method="post">
            <h1 class="txt1">RECUPERAR CONTRASEÑA</h1>
        <br><br>
        <label class="txt1">CORREO</label>
        <br> <br>
        <input class="inp1" type="email" name="email" placeholder="Email">
        <br> <br>
        <br><br>
        <button class="boton" type="submit" name="btnrec">ENVIAR PETICIÓN</button>
        <br><br>
        <br> <br>
        </form>
        <a href="index.php" class="txt1">Inicio de sesión</a> | <a href="registrar.php"  class="txt1">¿No tienes cuenta?</a>
        </center>
        <br><br>
        </div>
        <br>

    
</body>
</html>