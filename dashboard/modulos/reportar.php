<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reportar</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <?php
    
    include "../../conexion.php";
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
  <form class="w-100">
    <div class="form-row row">
      <h3 class="titles">Información Personal</h3>
      <div class="form-group col-md-3 mb-2">
        <label >Primer Nombre</label>
        <br>
        <input type="text" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['nom']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <label>Segundo Nombre</label>
        <br>
        <input type="text" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['snom']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <label>Primer Apellido</label>
        <br>
        <input type="text" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['ape']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <label>Segundo Apellido</label>
        <br>
        <input type="text" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['sape']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <label>Email</label>
        <br>
        <input type="Email" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['email']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <label for="inputZip">Grado</label>
        <br>
        <input type="text" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['grupo']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <label for="inputZip">Tú Rol</label>
        <br>
        <input type="text" class="selrep" id="selrepleer" placeholder="<?php echo $_SESSION['rolus']; ?>" readOnly>
      </div>
      <div class="form-group col-md-3 mb-2">
        <p class="text-break"> ¡Tranquil@! Esta información será vista únicamente por los administradores. La persona reportada no tendrá acceso a tu identidad. 😊</p>
      </div>
    </div>

    <div class="form-row row">
      <div class="form-group col-md-3">
        <h3 class="titles">Evidencia</h3>
        <label for="imagen">Selecciona una imagen</label>
        <input type="file" class="form-control campos" id="imagen" name="imagen" accept="image/*" onchange="vistaPrevia(event)">

        <label>Vista previa:</label><br>
        <img id="preview" src="" style="max-width: 80%; display: none; border-radius: 0.5rem;" alt="Vista previa de imagen">
      </div>
      <div class="form-group col-md-3">
        <h3 class="titles">Información Requerida</h3>
        <div class="form-row row">
        <div class="col-md-12 mb-2">
        <label for="inputEmail4">Descripción Breve</label>
        <textarea class="inpinv" id="descripcion" rows="4" placeholder="Descripción" ></textarea>
        </div>
      </div>
      </div>
      <div class="form-group col-md-6">
        <div class="form-row row mt-4">
        <div class="col-md-3 mb-2">
        <label for="inputEmail4">Responsable</label>
        <input type="email" class="selinv" id="inputEmail4" placeholder="Email" >
      </div>
      <div class="col-md-3 mb-2">
        <label for="inputEmail4">ID Enser</label>
        <input type="email" class="selinv" id="inputEmail4" placeholder="Email" >
      </div>
      <div class="col-md-3 mb-2">
        <label for="inputEmail4">Aula</label>
        <input type="email" class="selinv" id="inputEmail4" placeholder="Email" >
      </div>
      <div class="col-md-3 mb-2">
        <label for="inputEmail4">Bloque</label>
        <input type="email" class="selinv" id="inputEmail4" placeholder="Email" >
      </div>
      <div class="col-md-3 mb-2">
        <label for="inputEmail4">Fecha y Hora</label>
        <input type="email" class="selinv" id="inputEmail4" placeholder="Email" >
      </div>
      <div class="col-md-3 mb-6 mt-4">
            <button type="submit" class="btn  btnReport">Enviar Reporte</button>
      </div>
      </div>
      </div>
      </div>
    </div>
  </form>
</div>

</div>
 <script>
function vistaPrevia(event) {
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
}
</script>
</body>
</html>