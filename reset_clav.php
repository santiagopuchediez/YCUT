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
    <title>ACTUALIZACIÓN DE CLAVE</title>
</head>
<body background="img/bg1.jpg">

<?php
include 'conexion.php';

if(isset($_GET['token'])){
    $token = $_GET['token'];

    // Buscar token válido
    $stmt = $conexion->prepare("SELECT email, expira FROM contras WHERE token=? LIMIT 1");
    $stmt->bind_param("s", $token);
    $stmt->execute();
    $res = $stmt->get_result();

    if($res->num_rows > 0){
        $row = $res->fetch_assoc();

        if(strtotime($row['expira']) > time()){
            ?>
        <body>
        <div class="login">
        <center>
        <div class="logo">
        <img src="IMG/logoycutsf.png" width="100%" height="110%">
        <h1 class="logo-text">YCUT</h1>
        </div>
        <br>
        <form action="actcla.php" method="post">
            <h1 class="txt1">ACTUALIZA TU CLAVE</h1>
        <br><br>
        <label class="txt1">USUARIO</label>
        <br><br>
            <input type="hidden" class="inp1" name="token" value="<?php echo htmlspecialchars($token); ?>">

            <label class="txt1">Nueva Clave</label>
            <br>
            <input type="password" class="inp1" name="nueva" required><br>
            <br><br>
            <label class="txt1">Confirmar Clave</label>
            <br>
            <input type="password" class="inp1" name="confirmar" required><br>
            <br><br>
        <button class="boton" type="submit" name="btnactcla">ACTUALIZAR</button>
        </form>
        <a href="index.php" class="txt1">Inicio de sesión</a>
        </center>
        <br><br>
        </div>
        <br>

    
</body>

            <?php
        } else {
            echo "El enlace ha expirado.";
        }
    } else {
        echo "Token inválido.";
    }
}
?>
