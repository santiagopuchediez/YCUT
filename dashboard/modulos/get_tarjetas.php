<?php
include '../../conexion.php';

$bloque = $_GET['bloque'] ?? '';

$bloque_id = [
    'bloque_sur' => 1,
    'bloque_norte' => 2,
    'sala_profesores' => 3,
    'personal_aseo' => 4,
    'auditorio' => 5,
    'coordinaciones' => 6,
    'biblioteca' =>7,
    'secretarias' => 8,
    'coliseo' => 9
];


$bloque_label = [
    'bloque_sur' => 'AULA',
    'bloque_norte' => 'AULA',
    'sala_profesores' => 'SALA DE PROFESORES',
    'personal_aseo' => 'PERSONAL DE ASEO',
    'auditorio' => 'AUDITORIO',
    'coordinaciones' => 'COORDINACIÓN',
    'biblioteca' => 'BIBLIOTECA',
    'secretarias' => 'SECRETARÍA',
    'coliseo' => 'COLISEO'
];

if (isset($bloque_id[$bloque])) {
    $id_bloque = $bloque_id[$bloque];
    $label = $bloque_label[$bloque];
    $aulas = mysqli_query($conexion, "
        SELECT a.*, CONCAT(d.p_nombre, ' ', d.p_apellido) AS nombre_docente
        FROM aulas AS a
        LEFT JOIN usuarios AS d ON a.doc = d.doc
        WHERE a.id_bloque = $id_bloque");

    echo '<div class="contaulasinv">';
    while ($aula = mysqli_fetch_assoc($aulas)) {
        echo '<div class="aulasinv" onclick="cargarTabla(' . $aula['id_aula'] . ')">';
        echo '<img class="imgaulinv" src="../../img/aula3.jpg">';
        echo '<center>';
        echo '<h3>' . $label . ' ' . $aula['id_aula'] . '</h3>';
        echo '<p>Docente: </p>';
        echo '<p>'. ($aula['nombre_docente'] ?? 'No asignado') . '</p>'; 
        echo '</center>';
        echo '</div>';
    }
    echo '</div>';
} else {
    echo '<p>No hay aulas para este bloque.</p>';
}
?>
