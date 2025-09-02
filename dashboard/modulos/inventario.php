
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../../CSS/estilos.css"/>
    <title>INVENTARIO</title>
</head>
<body>
    <center>
        <h1>INVENTARIO</h1>
    </center>
    <main>
        <center>
        <div class="continv">
            
            <br>
            <button class="botoninv" name="btnaulsur">Aulas Bloque Sur</button>
            <button class="botoninv" name="btnsalpro">Sala de Profesores</button>
            <br><br>
            <button class="botoninv" name="btnaulnor">Aulas Bloque Norte</button>
            <button class="botoninv" name="btnaseo">Personal Aseo</button>
            <br><br>
            <button class="botoninv" name="btnaud">Auditorio</button>
            <button class="botoninv" name="btncor">Coordinaciones</button>
            <br><br>
        </div>
        </center>
        <br><br>
        <center>
        <form action="index.php?mod=inventario" method="post">
            <input type="" name="txtens" placeholder="Buscar Enser" class="inpinv">
            <button name="btnbusinv" class="btninv" type="submit">Buscar</button>
        </form>
        </center>
 <?php
    if (isset($_POST['btndelinv']) && isset($_POST['nmbidens'])) {
        include '../../conexion.php';
        $idens = intval($_POST['nmbidens']);
        $del = mysqli_query($conexion, "DELETE FROM enseres WHERE id_enser = $idens") or die("Problemas al ejecutar acción");
        echo "<script>alert('Eliminación Exitosa');</script>";
    }
    ?>
    <?php
    if(isset($_POST['btnbusinv'])){
        include '../../conexion.php';
        $datoens = $_POST['txtens'];
        $consulta = mysqli_query($conexion, "
            SELECT e.id_enser, e.estado, e.id_aula, b.cardinalidad AS nombre_bloque, t.nombre AS nombre_tipo
            FROM enseres AS e
            INNER JOIN tipo_enser AS t ON e.id_tipo = t.id_tipo
            INNER JOIN bloques AS b ON e.id_bloque = b.id_bloque
            WHERE t.nombre LIKE '%$datoens%'
        ") or die("Problemas en la conexión");

        if (isset($_POST['btnmodinve'])){
            include '../../conexion.php';
                      // Recibir datos
                      $idens = $_POST['nmbidens'];
                      $aula = $_POST['nmbaul'];
                      $tipo = $_POST['cmbtip'];
                      $estado = $_POST['cmbest'];
                      $bloque = $_POST['cmbblo'];
                     
            $update = mysqli_query($conexion, "UPDATE `enseres` SET `estado` = '$estado', `id_tipo` = '$tipo', `id_aula` = '$aula', `id_bloque` = '$bloque' WHERE `enseres`.`id_enser` = '$idens';");
          }
    ?>


            <table class="tableinv">
                <tr>
                    
                        <td>ID</td>
                        <td>Tipo</td>
                        <td>Aula</td>
                        <td>Bloque</td>
                        <td>Estado</td>
                        <td>Modificar</td>
                        <td>Eliminar</td>
                    
                </tr>
                 <?php
        while($row = mysqli_fetch_array($consulta)){
            ?>
        <tr>
            <td><?php echo $row['id_enser'] ?></td>
            <td><?php echo $row['nombre_tipo'] ?></td>
            <td><?php echo $row['id_aula'] ?></td>
            <td><?php echo $row['nombre_bloque'] ?></td>
            <td><?php echo $row['estado'] ?></td>

            <form action="index.php?mod=inventario" method="post">
            <input type="text" name="idens" value="<?php echo $row['id_enser']?? ''; ?>" hidden>
            <td>
            <button type="submit" class="botonges" name="btnmodinv"><i class="bi bi-cast"> <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
  <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
  <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
</svg></i></button></td>
        </form>
            <form action="index.php?mod=inventario" method="post">
            <td>
            <input type="nmb" name="nmbidens" value="<?php echo $row['id_enser']?? ''; ?>" hidden>
                <button type="submit" class="botonges" name="btndelinv"><i class="bi bi-cast"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
</svg></i></button></td> 
        </tr>
        </form>
            <?php
        }
    }else{
        echo '<p class="text-center">Ingrese datos para buscar.</p>';
    }
    ?>
            </table>
        </div>
        <?php
        if(isset($_POST['btnmodinv'])){
            include '../../conexion.php';
            $idens = intval($_POST['idens']);
            $consulta2 = mysqli_query($conexion, "
                SELECT e.id_enser, e.id_aula, e.estado, e.id_tipo, e.id_bloque,
                b.cardinalidad AS nombre_bloque,
                t.nombre AS nombre_tipo
                FROM enseres AS e
                INNER JOIN bloques AS b ON e.id_bloque = b.id_bloque
                INNER JOIN tipo_enser AS t ON e.id_tipo = t.id_tipo
                WHERE e.id_enser = '$idens'") or die("Problemas en la conexión");
            while($row3 = mysqli_fetch_array($consulta2)){
         ?>
        <div class="container mt-5">
        <h3 class="text-center mb-4">Modificar un enser</h3>
        <form method="post" action="index.php?mod=inventario">
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Aula de Ubicación del Enser</label>
                    <input type="number" name="nmbaul" class="inpinv" value="<?php echo $row3['id_aula']?? ''; ?>" required>
                    <input type="number" name="nmbidens" class="form-control campos" value="<?php echo $row3['id_enser']; ?>" hidden>
                </div>

               <div class="col-md-6 col-lg-3">
                    <label class="form-label">Bloque de Ubicación</label>
                    <select name="cmbblo" class="selinv" required>
                    <option value="<?php echo $row3['nombre_bloque']; ?>"><?php echo $row3['nombre_bloque']; ?></option>
                    <option value="1">Sur</option>
                    <option value="2">Norte</option>
                    </select>
                </div>

               <div class="col-md-6 col-lg-3">
                    <label class="form-label">Estado del Enser</label>
                    <select name="cmbest" class="selinv" required>
                    <option value="<?php echo $row3['estado']?? ''; ?>"><?php echo $row3['estado']?? ''; ?></option>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Dañado">Dañado</option>
                    <option value="Reemplazar">Reemplazar</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Tipo de Enser</label>
                    <select name="cmbtip" class="selinv" required>
                    <option value="<?php echo $row3['id_tipo']?? ''; ?>"><?php echo $row3['nombre_tipo']?? ''; ?></option>
                    <option value="1">Pupitre</option>
                    <option value="2">Computador de mesa</option>
                    <option value="3">Laptop</option>
                    <option value="4">Escritorio</option>
                    <option value="5">Tablero</option>
                    <option value="6">Ventilador</option>
                    </select>
                </div>

              
                    <button type="submit" name="btnmodinve" class="btnregens">Registrar Enser</button>
               
            </div>
        </form>
        <?php
      } 
    }   
?>
    </main>


</body>
</html>