<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="../../CSS/estilos.css">
  <title>Administrar Bloques</title>

  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css" rel="stylesheet">

  
</head>
<body>
  <div class="container my-5">
    <h1 class="text-center mb-4">Administrar Bloques</h1>

    <div class="row justify-content-center mb-4">
      <div class="col-md-6">
        <form action="index.php?mod=admin_bloques" method="post">
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
      $id = $_POST['id_bloque']; // aquí coinciden los nombres con el input hidden

      $sql = "DELETE FROM bloques WHERE id_bloque = '$id'";
      mysqli_query($conexion, $sql) or die("Problemas al ejecutar acción: " . mysqli_error($conexion));

      echo '<div class="alert alert-success text-center">Eliminación Exitosa</div>';
    }
    if (isset($_POST['btn_update'])) {
      include '../../conexion.php';
                // Recibir datos
                $idblo = $_POST['idblo'];
                $carblo = $_POST['carblo'];
                $carual = $_POST['caraul'];
      $update = mysqli_query($conexion, "UPDATE `bloques` SET `id_bloque` = '$idblo', `cardinalidad` = '$carblo', `cardinalidad_aulas` = '$carual' WHERE `bloques`.`id_bloque` = '$idblo';");
    }

    if (isset($_POST['btn_buscar'])) {
      include '../../conexion.php';
      $dato = $_POST['txtcons'];
      $consulta = mysqli_query($conexion,
        "SELECT * FROM bloques WHERE cardinalidad LIKE '%$dato%'"
      ) or die("Problemas en la conexión");

    ?>

    <div class="table-responsive">
      <table class="table table-hover align-middle text-center">
        <thead>
          <tr>
            <th>Id Bloque</th>
            <th>Cardinalidad del bloque</th>
            <th>Cardinalidad del aula</th>
            <th>Modificar</th>
            <th>Eliminar</th>
          </tr>
          
        </thead>
        <tbody>
          <?php while ($row = mysqli_fetch_array($consulta)) { ?>
          <tr>
            <td><?php echo $row['id_bloque']; ?></td>
            <td><?php echo $row['cardinalidad']; ?></td>
            <td><?php echo $row['cardinalidad_aulas']; ?></td>
            <td>
              <form action="index.php?mod=admin_bloques" method="post" class="d-inline">
                <input type="hidden" name="id_bloque" value="<?php echo $row['id_bloque']; ?>">
                <button
                  type="submit"
                  name="btnmod"
                  class="btn btn-edit btn-sm"
                ><i class="bi bi-pencil-square"></i></button>
              </form>
            </td>
            <td>
              <form action="index.php?mod=admin_bloques" method="post" class="d-inline">
                <input type="hidden" name="id_bloque" value="<?php echo $row['id_bloque']; ?>">
                <button
                  type="submit"
                  name="btndel"
                  class="btn btn-delete btn-sm"
                  onclick="return confirm('¿Está seguro de eliminar este bloque?');"
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
        $dato2 = $_POST['id_bloque'];
        $consulta2 = mysqli_query($conexion, "SELECT * FROM bloques WHERE id_bloque = '$dato2'") or die("Problemas en la conexión");
        while($row2 = mysqli_fetch_array($consulta2)){
      ?>
<h3 class="text-center mb-4">Modifica un Bloque</h3>
<form method="post" action="index.php?mod=admin_bloques">
    <div class="row g-3">
        <div class="col-md-6 col-lg-3">
            <label class="form-label">Id Bloque</label>
            <input type="text" name="idblo" class="form-control campos" 
                   value="<?php echo $row2['id_bloque']; ?>" required>
        </div>

        <div class="col-md-6 col-lg-3">
            <label class="form-label">Nombre del Bloque</label>
            <select name="carblo" class="form-select campos" required>
                <!-- Opción actual desde la BD -->
                <option value="<?php echo $row2['cardinalidad']; ?>" selected>
                    <?php echo $row2['cardinalidad']; ?>
                </option>
                <!-- Otras opciones -->
                <option value="Sur">Sur</option>
                <option value="Norte">Norte</option>
            </select>
        </div>

        <div class="col-md-6 col-lg-3">
            <label class="form-label">Cardinalidad del Aula</label>
            <select name="caraul" class="form-select campos" required>
                <!-- Opción actual desde la BD -->
                <option value="<?php echo $row2['cardinalidad_aulas']; ?>" selected>
                    <?php echo $row2['cardinalidad_aulas']; ?>
                </option>
                <!-- Otras opciones -->
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
            </select>
        </div>

        <!-- Campo oculto para saber cuál registro actualizar -->
        <input type="hidden" name="id" value="<?php echo $row2['id_bloque']; ?>">

        <div class="col-12">
            <button type="submit" name="btn_update" class="btn btn-primary w-100">
                Actualizar
            </button>
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