<?php
include __DIR__ . '/../../conexion.php';
$resultado = mysqli_query($conexion, "SELECT * FROM reportes");
?>
<!doctype html>
<html lang="es">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width,initial-scale=1">
  <title>Reportes</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="../../CSS/estilos.css">
</head>
<body>
<div class="container-fluid my-4">
  <center>
    <h1 class="mb-2">¡Visualiza los reportes!</h1>
    <p class="text-break">
      Aquí podés ver todos los reportes realizados por los estudiantes. Este espacio fue creado para que puedas notificar cualquier situación que afecte tu salón, los materiales o el entorno escolar. <br>
      Recuerda que cualquier observación, por pequeña que parezca, ¡puede marcar la diferencia! Gracias por ser parte del cambio y ayudar a mantener nuestra institución limpia, cuidada y segura. 
      <?php echo $_SESSION['snom']?>
    </p>
  </center>
  <!-- Cambié aquí: row-cols para el responsive automático -->
  <div class="row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-4 g-3">
    <?php while ($fila = mysqli_fetch_assoc($resultado)):
      $ruta = $fila['evidencia'];
      $rutaAbsoluta = __DIR__ . '/../../' . $ruta;
      $imgAttr = (!empty($ruta) && file_exists($rutaAbsoluta)) ? htmlspecialchars($ruta, ENT_QUOTES) : '';
      $id = (int)$fila['id_reporte'];
      $descripcionCorta = mb_strimwidth($fila['desc'], 0, 30, "...");
    ?>
      <div class="col">
        <div class="card shadow-sm h-100">
          <div class="card-body d-flex align-items-center">
            <?php if ($imgAttr): ?>
              <img src="../../<?= $imgAttr ?>" class="img-thumbnail me-3"
                   style="max-width:120px; max-height:120px; object-fit:cover;" alt="Evidencia">
            <?php else: ?>
              <div class="bg-light text-muted d-flex justify-content-center align-items-center me-3"
                   style="width:120px; height:120px; border-radius:8px;">
                Sin evidencia
              </div>
            <?php endif; ?>

            <div class="flex-fill">
              <h6 class="text-muted mb-2"> <?= htmlspecialchars($fila['fecha_hora']) ?></h6>
              <h5 class="mb-2"> <?= htmlspecialchars($fila['responsable']) ?></h5>
              <p class="mb-2"> <?= htmlspecialchars($descripcionCorta) ?></p>

              <div class="d-flex gap-2">
                <button type="button" class="btn btn-sm btn  btnReport"
                        data-bs-toggle="modal" data-bs-target="#viewModal"
                        data-id="<?= $id ?>"
                        data-fecha="<?= htmlspecialchars($fila['fecha_hora'], ENT_QUOTES) ?>"
                        data-responsable="<?= htmlspecialchars($fila['responsable'], ENT_QUOTES) ?>"
                        data-desc="<?= htmlspecialchars($fila['desc'], ENT_QUOTES) ?>"
                        data-img="<?= $imgAttr ?>">
                  Ver más
                </button>
                <button type="button" class="btn btn-sm btn-warning"
                        data-bs-toggle="modal" data-bs-target="#editModal"
                        data-id="<?= $id ?>"
                        data-responsable="<?= htmlspecialchars($fila['responsable'], ENT_QUOTES) ?>"
                        data-desc="<?= htmlspecialchars($fila['desc'], ENT_QUOTES) ?>">
                  Editar
                </button>
                <button type="button" class="btn btn-sm btn-danger"
                        data-bs-toggle="modal" data-bs-target="#deleteModal"
                        data-id="<?= $id ?>">
                  Eliminar
                </button>
              </div>
            </div>
          </div>
        </div>
      </div>
    <?php endwhile; ?>
  </div>
</div>

<!-- ========== MODAL: Ver Más ========== -->
<div class="modal fade" id="viewModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-lg modal-dialog-centered">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Reporte</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <div class="modal-body">
        <p class="mb-1"><strong>Fecha:</strong> <span class="modal-fecha"></span></p>
        <p class="mb-1"><strong>Responsable:</strong> <span class="modal-responsable"></span></p>
        <p><strong>Descripción:</strong><br><span class="modal-desc"></span></p>
        <img class="modal-img img-fluid rounded mt-3" src="" alt="Evidencia" style="display:none;">
        <p class="text-muted modal-noimg" style="display:none;">Sin evidencia</p>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
      </div>
    </div>
  </div>
</div>

<!-- ========== MODAL: Editar ========== -->
<div class="modal fade" id="editModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content"> <!-- tu clase CSS ya se aplica aquí -->
      <form action="../../code_editar_reporte.php" method="POST">
        <div class="modal-header"> <!-- aplica estilos header -->
          <h5 class="modal-title">Editar Reporte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body"> <!-- aplica estilos body -->
          <input type="hidden" id="edit-id" name="id" value="">
          <div class="mb-3">
            <label class="form-label">Responsable</label>
            <input id="edit-responsable" name="responsable" type="text" class="form-control" value="">
          </div>
          <div class="mb-3">
            <label class="form-label">Descripción</label>
            <textarea id="edit-desc" name="desc" class="form-control" rows="4"></textarea>
          </div>
        </div>
        <div class="modal-footer"> <!-- aplica estilos footer -->
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-warning">Guardar cambios</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- ========== MODAL: Eliminar ========== -->
<div class="modal fade" id="deleteModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog modal-sm">
    <div class="modal-content">
      <form action="../../code_eliminar_reporte.php" method="POST">
        <div class="modal-header">
          <h5 class="modal-title">Eliminar Reporte</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
        </div>
        <div class="modal-body">
          <input type="hidden" id="delete-id" name="id" value="">
          <p>¿Seguro que deseas eliminar el reporte <strong>#<span class="delete-confirm-id"></span></strong>?</p>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
          <button type="submit" class="btn btn-danger">Eliminar</button>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Bootstrap JS (bundle) -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- JS DE LOS MODALES-->
<script>
document.addEventListener('DOMContentLoaded', function() {
  // VER MAS
  var viewModal = document.getElementById('viewModal');
  viewModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id') || '';
    var fecha = button.getAttribute('data-fecha') || '';
    var responsable = button.getAttribute('data-responsable') || '';
    var desc = button.getAttribute('data-desc') || '';
    var img = button.getAttribute('data-img') || '';

    viewModal.querySelector('.modal-title').textContent = 'Reporte #' + id;
    viewModal.querySelector('.modal-fecha').textContent = fecha;
    viewModal.querySelector('.modal-responsable').textContent = responsable;
    viewModal.querySelector('.modal-desc').innerHTML = desc.replace(/\n/g, '<br>');

    var imgEl = viewModal.querySelector('.modal-img');
    var noImg = viewModal.querySelector('.modal-noimg');
    if (img) {
      imgEl.src = '../../' + img;
      imgEl.style.display = 'block';
      noImg.style.display = 'none';
    } else {
      imgEl.style.display = 'none';
      noImg.style.display = 'block';
    }
  });

  // EDITAR
  var editModal = document.getElementById('editModal');
  editModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id') || '';
    var responsable = button.getAttribute('data-responsable') || '';
    var desc = button.getAttribute('data-desc') || '';

    editModal.querySelector('#edit-id').value = id;
    editModal.querySelector('#edit-responsable').value = responsable;
    editModal.querySelector('#edit-desc').value = desc;
  });

  // ELIMINAR
  var deleteModal = document.getElementById('deleteModal');
  deleteModal.addEventListener('show.bs.modal', function (event) {
    var button = event.relatedTarget;
    var id = button.getAttribute('data-id') || '';
    deleteModal.querySelector('#delete-id').value = id;
    deleteModal.querySelector('.delete-confirm-id').textContent = id;
  });
});
</script>
</body>
</html>
