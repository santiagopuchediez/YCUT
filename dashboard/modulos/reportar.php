<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <?php
    
  /*   include "../../conexion.php";
    $doc = $_SESSION['user'];
    $userdatos = mysqli_query($conexion, "SELECT s_nombre, s_apellido, email, grupo, id_rol FROM usuarios WHERE doc = '$doc'")or die($conexion."Problemas en la consulta");
    $num1 = mysqli_num_rows($userdatos);
    if($num1 > 0){
    while($row1=mysqli_fetch_array($userdatos)){
        $_SESSION['snom'] = $row1['s_nombre'];
        $_SESSION['sape'] = $row1['s_apellido'];
        $_SESSION['grupo'] = $row1['grupo'];
        $_SESSION['email'] = $row1['email'];
        $_SESSION['rolus'] = $row1['id_rol'];
    }
  } */
 include "../../conexion.php";
$doc = $_SESSION['user'];

$userdatos = mysqli_query($conexion, "
    SELECT u.p_nombre, 
           u.s_nombre, 
           u.s_apellido, 
           u.email, 
           u.grupo, 
           u.id_rol,
           r.nombre
    FROM usuarios u
    INNER JOIN rol r ON u.id_rol = r.id_rol
    WHERE u.doc = '$doc'
") or die("Problemas en la consulta: ".mysqli_error($conexion));

$num1 = mysqli_num_rows($userdatos);
if($num1 > 0){
    while($row1 = mysqli_fetch_array($userdatos)){
        $_SESSION['nom']   = $row1['p_nombre'];
        $_SESSION['snom']  = $row1['s_nombre'];
        $_SESSION['sape']  = $row1['s_apellido'];
        $_SESSION['grupo'] = $row1['grupo'];
        $_SESSION['email'] = $row1['email'];
        $_SESSION['rol']   = $row1['id_rol'];
        $_SESSION['rolus'] = $row1['nombre']; // 🔹 aquí guardas el nombre del rol
    }
}

    ?>
</head>
<body>
<div class="container-fluid">
    <h1>¡Con tu ayuda, mantenemos el cole en buen estado!</h1>
  <div class="row align-items-center mt-3 mb-3">
    <!-- COLUMNA DEL CARRUSEL -->
    <div class="col-md-6 ">
      <div id="carouselExample" class="carousel slide">
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img src="../../IMG/aula1.jpg" class="d-block w-100 rounded-4" style="height: 200px; object-fit: cover;" alt="...">
      </div>
      <div class="carousel-item">
        <img src="../../IMG/aula_2.jpg" class="d-block w-100 rounded-4" style="height: 200px; object-fit: cover;" alt="...">
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Anterior</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Siguiente</span>
    </button>
  </div>
    </div>

    <!-- COLUMNA DEL TEXTO -->
    <div class="col-md-6">
      <h2 class="titles">¿De qué trata esto?</h1>
      <p class="text-break">
  ¡Parce! En YCUT nos parece muy chévere que quieras aportar al cuidado de tu colegio. Por eso creamos esta herramienta para que puedas reportar cualquier daño en los salones, pupitres o lo que veas fuera de lugar. Si ves a alguien maltratando algo del aula, también lo podés reportar sin problema. ¡Entre todos podemos tener un espacio más formidable para estudiar!
  <?php echo $_SESSION['snom']?>
</p>
    </div>
  </div> 
  <!-- FORMULARIO PARA REPORTAR -->
<div class="row align-items-center mt-3 mb-3">
  <form class="w-100" enctype="multipart/form-data" method="post" action="../../code_reportar.php">
    <!-- SECCIÓN DE INFORMACIÓN PERSONAL (OCUPANDO TODO EL ANCHO) -->
    <div class="form-row row mb-4">
      <h3 class="titles">Información Personal</h3>
    
      <!-- PRIMERA FILA: NOMBRES Y APELLIDOS -->
      <div class="row">
        <div class="form-group col-md-3 mb-2">
          <label>Primer Nombre</label>
          <input type="text" class="form-control selrep" id="selreplee" value="<?php echo $_SESSION['nom']; ?>" readonly>
        </div>
        <div class="form-group col-md-3 mb-2">
          <label>Segundo Nombre</label>
          <input type="text" class="form-control selrep" value="<?php echo $_SESSION['snom']; ?>" readonly>
        </div>
        <div class="form-group col-md-3 mb-2">
          <label>Primer Apellido</label>
          <input type="text" class="form-control selrep" value="<?php echo $_SESSION['ape']; ?>" readonly>
        </div>
        <div class="form-group col-md-3 mb-2">
          <label>Segundo Apellido</label>
          <input type="text" class="form-control selrep" value="<?php echo $_SESSION['sape']; ?>" readonly>
        </div>
      </div>

      <!-- SEGUNDA FILA: EMAIL, GRADO Y ROL -->
      <div class="row">
        <div class="form-group col-md-4 mb-2">
          <label>Email</label>
          <input type="email" class="form-control selrep" value="<?php echo $_SESSION['email']; ?>" readonly>
        </div>
        <div class="form-group col-md-2 mb-2">
          <label>Grado</label>
          <input type="text" class="form-control selrep" value="<?php echo $_SESSION['grupo']; ?>" readonly>
        </div>
        <div class="form-group col-md-3 mb-2">
          <label>Tu Rol</label>
          <input type="text" class="form-control selrep" value="<?php echo $_SESSION['rolus']; ?>" readonly>
        </div>
        <div class="form-group col-md-3 mb-2">
          <label><b>¿Información Erronea?</b></label>
          <button type="submit" class="btn  btnReport">Actualizar Datos</button>
        </div>
      </div>

      <!-- MENSAJE DE PRIVACIDAD -->
      <div class="form-group col-md-12 mb-2">
        <p class="text-break">
          ¡Tranquil@! Esta información será vista únicamente por los administradores. La persona reportada no tendrá acceso a tu identidad. 😊
        </p>
      </div>
    </div>
    <div class="form-row row">
      <div class="form-group col-md-2">
        <h3 class="titles">Evidencia</h3>
        <label for="imagen">Selecciona una imagen</label>
        <input type="file" class="form-control campos" id="imagen" name="evidencia" accept="image/*" onchange="vistaPrevia(event)">
      </div>
      <!-- <div class="form-group col-md-3">
      <label>Vista previa:</label><br>
      <img id="preview" src="" style="display:none; max-width:200px; max-height:200px; object-fit:contain; border-radius: 0.5rem;" alt="Vista previa de imagen">
      </div> -->
      <div class="form-group col-md-10 mb-2">
        <h3 class="titles">Información Requerida</h3>
        <div class="form-row row">
        <div class="col-md-7 mb-2">
        <label for="">Descripción Breve</label>
        <textarea class="form-control selrep" name="descrip" id="textarea" oninput="ajustarAltura(this)" style="resize:none; width:100%; overflow:hidden;"></textarea>
        </div>
        <div class="col-md-5">
        <p class="text-break"> <?php echo $_SESSION['nom']?>, recuerda verificar todo lo ingresado, antes de enviar. ✅</p>
        </div>
        </div>
      </div>
        <div class="form-row row">
        <div class="col-md-3">
        <label for="inputEmail4">Responsable</label>
        <input name="responsa" type="text" class="form-control selrep" id="inputEmail4">
      </div>
      <div class="col-md-3 mb-2">
        <label for="">ID Enser</label>
        <input name="idEnser" type="number" class="form-control selrep" id="inputEmail4">
      </div>
      <div class="col-md-3 mb-2">
        <label for="">Aula</label>
        <input name="aula" type="number" class="form-control selrep" id="inputEmail4">
      </div>
      <div class="col-md-3 mb-2">
        <label for="">Bloque</label>
        <input name="bloque" type="number" class="form-control selrep" id="inputEmail4">
      </div>
      <div class="col-md-3 mb-2">
        <label for="">Fecha</label>
        <input name="date" type="date" class="form-control selrep" id="inputEmail4">
      </div>
      <div class="col-md-3 mb-6 mt-4">
            <button type="submit" name="btn_report" class="btn  btnReport">Enviar Reporte</button>
      </div>
      </div>
      </div>
    </div>
  </form>
</div>

</div>
 <script>
/* function vistaPrevia(event) {
  const input = event.target;
  const img = document.getElementById('preview');
  
  if (input.files && input.files[0]) {
    const reader = new FileReader();
    reader.onload = function(e) {
      img.src = e.target.result;
      img.style.display = 'block';
    };
    reader.readAsDataURL(input.files[0]);
  }
} */
function ajustarAltura(el) {
  el.style.height = 5 + "px";              // reinicia la altura
  el.style.height = el.scrollHeight + "px"; // ajusta a la altura real del contenido
}
</script>
</body>
</html>