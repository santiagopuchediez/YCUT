<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../CSS/estilos.css">
  <title>Gestionar Usuario</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  
</head>
<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Consultar Usuarios</h1>

    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <form action="index.php?mod=gestionar_usuarios" method="post">
          <div class="input-group">
            <input
              type="text"
              class="inpgesusu"
              name="txtcons"
              placeholder="Buscar por nombre"
              aria-label="Buscar por nombre"
            >
            <button class="btngesusu" type="submit" name="btn_buscar">
              <i class="bi bi-search me-1"></i>Buscar
            </button>
          </div>
        </form>
      </div>
    </div>

    <?php
    if (isset($_POST['btndel'])) {
      include '../../conexion.php';
      $doc = $_POST['doc'];
      mysqli_query($conexion,
        "DELETE FROM usuarios WHERE usuarios.doc = $doc"
      ) or die("Problemas al ejecutar acción");
      echo '<div class="alert alert-success text-center">Eliminación Exitosa</div>';
    }
    if (isset($_POST['btn_update'])) {
      include '../../conexion.php';
                // Recibir datos
                $doc = $_POST['txtdoc'];
                $pnombre = $_POST['txtnom'];
                $snombre = $_POST['txtsnom'];
                $papellido = $_POST['txtape'];
                $sapellido = $_POST['txtsape'];
                $tipodoc = $_POST['cmbdoc'];
                $rol = $_POST['cmbrol'];
                $correo = $_POST['email'];
                $grupo = $_POST['nmbgrupo'];
      $update = mysqli_query($conexion, "UPDATE `usuarios` SET `tipo_doc` = '$tipodoc', `p_nombre` = '$pnombre', `s_nombre` = '$snombre', `p_apellido` = '$papellido', `s_apellido` = '$sapellido', `email` = '$correo', `grupo` = '$grupo' WHERE `usuarios`.`doc` = '$doc';");
    }

    if (isset($_POST['btn_buscar'])) {
      include '../../conexion.php';
      $dato = $_POST['txtcons'];
      $consulta = mysqli_query($conexion,
        "SELECT * FROM usuarios WHERE p_nombre LIKE '%$dato%'"
      ) or die("Problemas en la conexión");
    ?>

    <div class="table-responsive">
      <table class="table table-hover align-middle text-center">
        <thead>
          <tr>
            <th>Tipo Documento</th>
            <th>Documento</th>
            <th>Primer Nombre</th>
            <th>Segundo Nombre</th>
            <th>Primer Apellido</th>
            <th>Segundo Apellido</th>
            <th>Rol</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
          
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($consulta)) { ?>
          <tr>
            <td><?php echo $row['tipo_doc']; ?></td>
            <td><?php echo $row['doc']; ?></td>
            <td><?php echo $row['p_nombre']; ?></td>
            <td><?php echo $row['s_nombre']; ?></td>
            <td><?php echo $row['p_apellido']; ?></td>
            <td><?php echo $row['s_apellido']; ?></td>
            <td><?php echo $row['id_rol']; ?></td>
            <td>
              <form action="index.php?mod=gestionar_usuarios" method="post" class="d-inline">
                <input type="hidden" name="doc" value="<?php echo $row['doc']; ?>">
                <button
                  type="submit"
                  name="btnmod"
                  class="btn btn-edit btn-sm"
                ><i class="bi bi-pencil-square"></i></button>
              </form>
            </td>
            <td>
              <form action="index.php?mod=gestionar_usuarios" method="post" class="d-inline">
                <input type="hidden" name="doc" value="<?php echo $row['doc']; ?>">
                <button
                  type="submit"
                  name="btndel"
                  class="btn btn-delete btn-sm"
                  onclick="return confirm('¿Está seguro de eliminar este usuario?');"
                ><i class="bi bi-trash"></i></button>
              </form>
            </td>
          </tr>
          <?php } ?>
        </tbody>
      </table>

    </div>

    <?php
    } else {
      echo '<p class="text-center">Ingrese datos para buscar.</p>';
    }
    ?>  
  </div>
  <?php
      if(isset($_POST['btnmod'])){
        include '../../conexion.php';
        $dato2 = $_POST['doc'];
        $consulta2 = mysqli_query($conexion, "SELECT * FROM usuarios WHERE doc = '$dato2'") or die("Problemas en la conexión");
        while($row2 = mysqli_fetch_array($consulta2)){
      ?>
      <h3 class="text-center mb-4">Modifica un Usuario</h3>
        <form method="post" action="index.php?mod=gestionar_usuarios">
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Primer Nombre</label>
                    <input type="text" name="txtnom" class="form-control campos" value="<?php echo $row2['p_nombre'] ?>"  required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Segundo Nombre</label>
                    <input type="text" name="txtsnom" class="form-control campos" value="<?php echo $row2['s_nombre'] ?>" >
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Primer Apellido</label>
                    <input type="text" name="txtape" class="form-control campos" value="<?php echo $row2['p_apellido'] ?>"  required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Segundo Apellido</label>
                    <input type="text" name="txtsape" class="form-control campos" value="<?php echo $row2['s_apellido'] ?>" >
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Número de Documento</label>
                    <input type="number" name="txtdoc" class="form-control campos" value="<?php echo $row2['doc'] ?>" readonly required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Tipo de Documento</label>
                    <select name="cmbdoc" class="form-select campos" required>
                        <option value=""><?php echo $row2['tipo_doc'] ?></option>
                        <option value="CC">CC / Cédula de ciudadanía</option>
                        <option value="TI">TI / Tarjeta de identidad</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="form-control campos" value="<?php echo $row2['email'] ?>" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Grupo</label>
                    <input type="number" name="nmbgrupo" class="form-control campos" value="<?php echo $row2['grupo'] ?>" readonly required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Rol de Usuario</label>
                    <select name="cmbrol" class="form-select campos" required>
                        <option value="<?php echo $row2['id_rol'] ?>"><?php echo $row2['id_rol'] ?></option>
                        <option value="">Seleccione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Operario</option>
                        <option value="3">Asesor</option>
                    </select>
                </div>

                <div class="col-12">
          <button type="submit" name="btn_update" class="btn btn-primary w-100">Registrar</button>
        </div>
      </div>
    </form>

<?php
      } 
    }   
?>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>