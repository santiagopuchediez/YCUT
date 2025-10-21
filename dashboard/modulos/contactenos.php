<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <title>CONTACTENOS</title>
</head>
<body>
<?php
include '../../conexion.php';
$rol = $_SESSION['rol'];
$sql = "SELECT nombre FROM rol WHERE id_rol = '$rol' ";
$resultado = mysqli_query($conexion, $sql);
$rolNombre = '';

if ($resultado && $fila = mysqli_fetch_assoc($resultado)) {
    $rolNombre = $fila['nombre'];
}
?>
    <center>
    <h1>CONTACTENOS</h1>
    </center>
    <div class="cont">
    <div class="campcont">
    <h3>Datos del usuario</h3>
    <form>

    <label>Nombres: </label>
    <input id="inpcontdat" type="text" value="<?php echo $_SESSION['nom'], ' ', $_SESSION['snom'] ?? ' '; ?>" readonly>
    <br>
    <label>Apellidos: </label>
    <input id="inpcontdat" type="text" value="<?php echo $_SESSION['ape'], ' ', $_SESSION['sape'] ?? ' '; ?>" readonly>
    <br>
    <label>Tipo de Usuario: </label>
    <input id="inpcontdat" type="text" value="<?php echo $rolNombre; ?> " readonly>
    <br>
    <label>Email: </label>
    <input id="inpcontdat" type="text" value="<?php echo $_SESSION['email']; ?>" readonly>
    <br>

    <br>
    <h3>Información YCUT</h3>
    <label>Dirección: </label>
    <input id="inpcontdatycut" type="text" value="Cra. 36 #45-8, El Salvador">
    <br>
    <label>Teléfono: </label>
    <input id="inpcontdatycut" type="text" value="+57 300 7778749">
    <br>
    <label>Email: </label>
    <input id="inpcontdatycut" type="text" value="yocuidoytu@gmail.com">
    <br>
    <iframe
    src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d991.5441732063819!2d-75.55898893043276!3d6.240428899609251!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8e44285b0a0ea415%3A0xe6c3a4f4c1f8bdf!2sFederico%20Ozanam%20Educational%20Institution!5e0!3m2!1sen!2sco!4v1761013163579!5m2!1sen!2sco"
    width="100%"
    height="160"
    style="border:0; border-radius:10px;"
    allowfullscreen=""
    loading="lazy"
    referrerpolicy="no-referrer-when-downgrade">
    </iframe>
    </form>
    </div>


    
    <br>
    <div class="campcont" id="campnot">
    <form action="../../PHPMailer-master/contactanos_code.php" method="POST">
        <h2>Asunto: </h2>
        <input class="inpcont" type="text" name="txtasu" placeholder="Asunto del mensaje">
        <br><br>
        <h2>Mensaje: </h2>
        <textarea class="inpcont" name="txtmes" placeholder="Mensaje" oninput="ajustarAltura(this)" style="resize:none; width:100%; overflow:hidden;"></textarea>
        <br>
        <button class="btncont" type="submit" name="btncont">ENVIAR</button>
    </div>
    </div>

    <script>
function ajustarAltura(el) {
  el.style.height = "auto";
  const maxHeight = 300; 
  if (el.scrollHeight > maxHeight) {
    el.style.height = maxHeight + "px";
    el.style.overflowY = "auto"; 
  } else {
    el.style.height = el.scrollHeight + "px";
    el.style.overflowY = "hidden"; 
  }
}
    </script>
</body>
</html>