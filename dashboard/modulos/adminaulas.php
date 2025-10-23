<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/YCUT/CSS/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <title>ADMINISTAR AULAS</title>
</head>
<body>
    <center>
    <h1>Administar aulas</h1>
    </center>
    <div class="container mt-5">
        <h3 class="text-center mb-4">Registra un aula</h3>
        <form method="post" action="../../registrar_aula.php">
            <div class="row g-3">
                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Documento del responsable de aula</label>
                    <input type="text" name="idresaul" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Cargo del responsable de aula</label>
                    <select name="carresaul" class="selinv" required>
                        <option value="">Seleccione</option>
                        <option value="2">Docente</option>
                        <option value="3">Coordinador</option>
                        <option value="5">Rector</option>
                    </select>
                </div>


                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Número del aula</label>
                    <input type="text" name="numaul" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-4">
                    <label class="form-label">Bloque de aula</label>
                    <select name="bloaul" class="selinv" required>
                        <option value="">Seleccione</option>
                        <option value="1">Sur</option>
                        <option value="2">Norte</option>
                    </select>
                </div>

                    <button type="submit" name="btnregaul" class="btnregens">Registrar aula</button>

            </div>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

    
</body>
</html>