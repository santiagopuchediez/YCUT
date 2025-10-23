<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/estilos.css">
</head>
<body class="bg-color: #f2f0eb;">
    <div class="container mt-5">
        <h3 class="text-center mb-4">Registra un Bloque</h3>
        <form method="post" action="../../registrar_bloque.php">
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Id del bloque</label>
                    <input type="text" name="idblo" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Nombre del bloque</label>
                    <input type="text" name="carblo" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Cardinalidad del bloque</label>
                    <select name="caraul" class="selinv" required>
                        <option value="">Seleccione</option>
                        <option value="1">Sur</option>
                        <option value="2">Norte</option>
                    </select>
                </div>

                    <button type="submit" name="btnregblo" class="btnregens">Registrar</button>

            </div>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>