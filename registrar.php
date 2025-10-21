<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="CSS/estilos.css">
    <link rel="icon" type="image/x-icon" href="img/logo.png">
    <title>REGISTRAR</title>
</head>
<body background="img/bg1.jpg" bgcolor="black">
        <div class="reg">
            <center>
            <div class="logo">
    <img src="img/logo.png" width="100%" height="110%">
    <h1 class="logo-text">YCUT</h1>
    </div>
            <form action="code_registrar.php" method="post">
            <h1 class="txt1">REGISTRARSE</h1>
            <br>
            <label class="txt1">USUARIO</label>
            <br> <br>
            <select class="sel1" name="cmbdoc" required>
                <option value="">Seleccione Tipo de Documento</option>
                <option value="CC">CC</option>
                <option value="TI">TI</option>
            </select>
            <br><br>
            <input class="inp1" type="text" name="txtdoc" placeholder="Documento" required>
            <br> <br>
            <input class="inp1" type="text" name="txtnom" placeholder="Nombre" required>
            <br><br>
            <input class="inp1" type="text" name="txtsnom" placeholder="Segundo Nombre">
            <br><br>
            <input class="inp1" type="text" name="txtape" placeholder="Apellido" required>
            <br><br>
            <input class="inp1" type="text" name="txtsape" placeholder="Segundo Apellido" required>
            <br><br>
            <input class="inp1" type="email" name="email" placeholder="Email" required>
            <br><br>
            <input class="inp1" type="number" name="nmbgrupo" placeholder="Grupo">
            <br><br>
            <label class="txt1">TIPO DE USUARIO</label>
            <br>
            <select class="sel1" name="cmbrol" required>
                <option value="">Seleccione Tipo de Usuario</option>
                <option value="1">Estudiante</option>
                <option value="2">Docente</option>
                <option value="3">Coordinador</option>
                <option value="4">Secretaria</option>
                <option value="5">Rector</option>
                <option value="6">Logistica</option>
            </select>
            <br><br>
            <input class="inp1" type="password" name="txtpass" placeholder="Contraseña">
            <br><br>
            <input class="inp1" type="password" name="txtpassc" placeholder="Confirmar Contraseña">
            <br><br>
            <button class="boton" type="submit" name="btnRegis">REGISTRAR</button>
            <br><br>
            </form>
            <a href="index.php" class="txt1">¿Ya tienes cuenta?</a>
            <br><br>
            </center>
        </div>

</body>
</html>