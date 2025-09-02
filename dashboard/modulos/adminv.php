<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/estilos.css">
    <title>Administrar Inventario</title>
</head>
<body>
    <center>
        <h1>Agregar Enseres al Inventario</h1>
    </center>
     <div class="container mt-5">
        <h3 class="text-center mb-4">Registrar un enser</h3>
        <form method="post" action="../../code_reginv.php">
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Aula de Ubicación del Enser</label>
                    <input type="number" name="nmbaul" class="inpinv" required>
                    <input type="number" name="nmbidens" class="form-control campos" hidden>
                </div>

               <div class="col-md-6 col-lg-3">
                    <label class="form-label">Bloque de Ubicación</label>
                    <select name="cmbblo" class="selinv" required>
                    <option value="">Seleccione Bloque</option>
                    <option value="1">Sur</option>
                    <option value="2">Norte</option>
                    </select>
                </div>

               <div class="col-md-6 col-lg-3">
                    <label class="form-label">Estado del Enser</label>
                    <select name="cmbest" class="selinv" required>
                    <option value="">Seleccione Estado</option>
                    <option value="Bueno">Bueno</option>
                    <option value="Regular">Regular</option>
                    <option value="Dañado">Dañado</option>
                    <option value="Reemplazar">Reemplazar</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Tipo de Enser</label>
                    <select name="cmbtip" class="selinv" required>
                    <option value="">Seleccione Tipo de Enser</option>
                    <option value="1">Pupitre</option>
                    <option value="2">Computador de mesa</option>
                    <option value="3">Laptop</option>
                    <option value="4">Escritorio</option>
                    <option value="5">Tablero</option>
                    <option value="6">Ventilador</option>
                    </select>
                </div>

              
                    <button type="submit" name="btnregens" class="btnregens">Registrar Enser</button>
               
            </div>
        </form>

        

    </div>
</body>
</html>