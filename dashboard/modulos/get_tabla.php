<?php
include '../../conexion.php';

$id_aula = intval($_GET['aula'] ?? 0);

$consulta = mysqli_query($conexion, "
    SELECT e.id_enser, e.estado, e.id_aula, b.cardinalidad AS nombre_bloque, t.nombre AS nombre_tipo
    FROM enseres AS e
    INNER JOIN tipo_enser AS t ON e.id_tipo = t.id_tipo
    INNER JOIN bloques AS b ON e.id_bloque = b.id_bloque
    WHERE e.id_aula = $id_aula
") or die("Problemas en la conexión");

echo '<table class="tableinv">
<tr>
    <td>ID</td>
    <td>Tipo</td>
    <td>Aula</td>
    <td>Bloque</td>
    <td>Estado</td>
    <td>Modificar</td>
    <td>Eliminar</td>
</tr>';

while($row = mysqli_fetch_array($consulta)){
    echo '<tr>';
    echo '<td>' . $row['id_enser'] . '</td>';
    echo '<td>' . $row['nombre_tipo'] . '</td>';
    echo '<td>' . $row['id_aula'] . '</td>';
    echo '<td>' . $row['nombre_bloque'] . '</td>';
    echo '<td>' . $row['estado'] . '</td>';

    echo '<td>
            <form action="index.php?mod=inventario" method="post">
                <input type="hidden" name="idens" value="' . $row['id_enser'] . '">
                <button type="submit" class="botonges" name="btnmodinv">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-file-plus" viewBox="0 0 16 16">
                      <path d="M8.5 6a.5.5 0 0 0-1 0v1.5H6a.5.5 0 0 0 0 1h1.5V10a.5.5 0 0 0 1 0V8.5H10a.5.5 0 0 0 0-1H8.5z"/>
                      <path d="M2 2a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H4a2 2 0 0 1-2-2zm10-1H4a1 1 0 0 0-1 1v12a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V2a1 1 0 0 0-1-1"/>
                    </svg>
                </button>
            </form>
          </td>';

    echo '<td>
            <form action="index.php?mod=inventario" method="post">
                <input type="hidden" name="nmbidens" value="' . $row['id_enser'] . '">
                <button type="submit" class="botonges" name="btndelinv">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
                      <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5m3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0z"/>
                      <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1zM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4zM2.5 3h11V2h-11z"/>
                    </svg>
                </button>
            </form>
          </td>';

    echo '</tr>';
}
echo '</table>';
?>
