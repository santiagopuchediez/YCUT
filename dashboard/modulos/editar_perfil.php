<?php
session_start();
include "../../conexion.php";

if (!isset($_SESSION['user'])) {
    header("Location: ../../login.php");
    exit();
}

$doc = $_SESSION['user'];

$consulta = mysqli_query($conexion, "
    SELECT p_nombre, s_nombre, p_apellido, s_apellido, email, grupo, foto_perfil 
    FROM usuarios 
    WHERE doc = '$doc'
") or die("Error en la consulta: " . mysqli_error($conexion));


$usuario = mysqli_fetch_assoc($consulta);

if (!$usuario) {
    $usuario = [
        'p_nombre' => '',
        's_nombre' => '',
        'p_apellido' => '',
        's_apellido' => '',
        'email' => '',
        'grupo' => ''
    ];
}

if (isset($_POST['guardar'])) {
    $p_nombre = $_POST['p_nombre'];
    $s_nombre = $_POST['s_nombre'];
    $p_apellido = $_POST['p_apellido'];
    $s_apellido = $_POST['s_apellido'];
    $email = $_POST['email'];
    $grupo = $_POST['grupo'];
    $foto_sql = "";
    if (!empty($_FILES['foto']['name'])) {
        $carpetaDestino = "../../uploads/";
        if (!file_exists($carpetaDestino)) mkdir($carpetaDestino, 0777, true);

        $nombreArchivo = basename($_FILES['foto']['name']);
        $rutaArchivo = $carpetaDestino . $nombreArchivo;

        if (move_uploaded_file($_FILES['foto']['tmp_name'], $rutaArchivo)) {
            $rutaRelativa = "uploads/" . $nombreArchivo;
            $foto_sql = ", foto_perfil='$rutaRelativa'";
        }
    }

    $actualizar = mysqli_query($conexion, "
        UPDATE usuarios 
        SET p_nombre='$p_nombre', s_nombre='$s_nombre',
            p_apellido='$p_apellido', s_apellido='$s_apellido',
            email='$email', grupo='$grupo' $foto_sql
        WHERE doc='$doc'
    ") or die("Error al actualizar: " . mysqli_error($conexion));

    header("Location: ../pages/index.php?mod=perfilusuario");   
    exit();
}
?>

<!doctype html>
<html lang="es">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Editar Perfil</title>
<style>
body{
  font-family: Arial, sans-serif;
  background: #f0f2f5;
  margin:0; padding:0;
}
.container{
  max-width: 500px;
  margin: 60px auto;
  background: #fff;
  padding: 30px;
  border-radius: 12px;
  box-shadow: 0 8px 20px -8px rgba(0,0,0,.2);
}
h1{
  text-align:center;
  color:#2A9D8F;
}
form{
  display:flex;
  flex-direction:column;
  gap:12px;
}
label{
  font-weight:bold;
}
input{
  padding:10px;
  border:1px solid #ccc;
  border-radius:8px;
}
button{
  background:#2A9D8F;
  color:white;
  border:none;
  padding:12px;
  border-radius:8px;
  cursor:pointer;
  font-weight:bold;
}
button:hover{
  background:#21867A;
}
a.volver{
  display:block;
  text-align:center;
  margin-top:10px;
  text-decoration:none;
  color:#2A9D8F;
  font-weight:bold;
}
a.volver:hover{
  text-decoration:underline;
}
img.preview{
  width:100px; height:100px;
  border-radius:50%; object-fit:cover;
  margin:10px auto; display:block;
}
</style>
</head>
<body>

<div class="container">
  <h1>Editar Perfil</h1>
  <form method="POST" action="editar_perfil.php" enctype="multipart/form-data">
    <label>Primer Nombre:</label>
    <input type="text" name="p_nombre" value="<?php echo htmlspecialchars($usuario['p_nombre']); ?>" required>

    <label>Segundo Nombre:</label>
    <input type="text" name="s_nombre" value="<?php echo htmlspecialchars($usuario['s_nombre']); ?>">

    <label>Primer Apellido:</label>
    <input type="text" name="p_apellido" value="<?php echo htmlspecialchars($usuario['p_apellido']); ?>" required>

    <label>Segundo Apellido:</label>
    <input type="text" name="s_apellido" value="<?php echo htmlspecialchars($usuario['s_apellido']); ?>">

    <label>Email:</label>
    <input type="email" name="email" value="<?php echo htmlspecialchars($usuario['email']); ?>" required>

    <label>Grupo:</label>
    <input type="number" name="grupo" value="<?php echo htmlspecialchars($usuario['grupo']); ?>">

    <label>Foto de Perfil:</label>
    <input type="file" name="foto" accept="image/*">
    <?php if (!empty($usuario['foto_perfil'])): ?>
      <img src="../../<?php echo $usuario['foto_perfil']; ?>" class="preview">
    <?php endif; ?>

    <button type="submit" name="guardar">Guardar Cambios</button>
  </form>

<a href="../pages/index.php?mod=perfilusuario" class="volver">← Volver al Perfil</a>
</div>

</body>
</html>
