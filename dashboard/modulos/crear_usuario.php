<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro Form</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../../CSS/estilos.css">
</head>
<body style="background-color: #f2f0eb;">
    <div class="container mt-5">
        <h3 class="text-center mb-4">Registra un Usuario</h3>
        <form method="post" action="../../code_registrar.php">
            <div class="row g-3">
                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Primer Nombre</label>
                    <input type="text" name="txtnom" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Segundo Nombre</label>
                    <input type="text" name="txtsnom" class="selinv">
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Primer Apellido</label>
                    <input type="text" name="txtape" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Segundo Apellido</label>
                    <input type="text" name="txtsape" class="selinv">
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Número de Documento</label>
                    <input type="number" name="txtdoc" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Tipo de Documento</label>
                    <select name="cmbdoc" class="selinv" required>
                        <option value="">Seleccione</option>
                        <option value="CC">CC / Cédula de ciudadanía</option>
                        <option value="TI">TI / Tarjeta de identidad</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Correo Electrónico</label>
                    <input type="email" name="email" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Grupo</label>
                    <input type="number" name="nmbgrupo" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Rol de Usuario</label>
                    <select name="cmbrol" class="selinv" required>
                        <option value="">Seleccione</option>
                        <option value="1">Administrador</option>
                        <option value="2">Operario</option>
                        <option value="3">Asesor</option>
                    </select>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Crea una contraseña</label>
                    <input type="password" name="clave" class="selinv" required>
                </div>

                <div class="col-md-6 col-lg-3">
                    <label class="form-label">Confirma tu contraseña</label>
                    <input type="password" name="confirmClave" class="selinv" required>
                </div>

                    <button type="submit" name="btnRegis" class="btnregens">Registrar</button>

            </div>
        </form>
    </div>

    <!-- Bootstrap JS (opcional) -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
