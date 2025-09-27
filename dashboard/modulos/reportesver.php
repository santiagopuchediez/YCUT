<?php
include __DIR__ . '/../../conexion.php';

$resultado = mysqli_query($conexion, "SELECT * FROM reportes");

echo "<table border='1'>
<tr>
    <th>ID</th>
    <th>Responsable</th>
    <th>Descripción</th>
    <th>Fecha</th>
    <th>Imagen</th>
</tr>";

while ($fila = mysqli_fetch_assoc($resultado)) {
    echo "<tr>";
    echo "<td>" . $fila['id_reporte'] . "</td>";
    echo "<td>" . $fila['responsable'] . "</td>";
    echo "<td>" . $fila['desc'] . "</td>";
    echo "<td>" . $fila['fecha_hora'] . "</td>";

    var_dump($fila['evidencia']); // Para ver el valor que trae la columna

    $ruta = $fila['evidencia'];
    if (!empty($ruta) && $ruta !== 'N/A' && file_exists(__DIR__ . '/../../' . $ruta)) {
        echo "<td><img src='../../" . $ruta . "' width='100'></td>";
    } else {
        echo "<td>Sin imagen</td>";
    }
}

echo "</table>";
?>
