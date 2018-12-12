<?php
include "../database/conexion.php";
header("Content-Type: application/json; charset=UTF-8");
$id_subarea = $_POST["id_subarea"];
// echo $id_subarea;

$query_actividades_secundarias = "select asec.id_actividad_secundaria, asec.titulo from actividades_secundarias as asec join subareas as s on asec.id_subarea=s.id_subarea where s.id_subarea=" . $id_subarea;
$result_query_actividades_secundarias = mysqli_query($conn, $query_actividades_secundarias);

while ($row = mysqli_fetch_assoc($result_query_actividades_secundarias)) {
  $resultado[] = $row;
}

echo json_encode($resultado);

 ?>
