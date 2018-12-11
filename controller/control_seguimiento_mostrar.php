<?php
include "../database/conexion.php";
header("Content-Type: application/json; charset=UTF-8");

$titulo_actividad = $_POST["titulo_actividad"];

$query_editar = "select * from actividades where titulo_actividad='" . $titulo_actividad . "'";
$result_editar = mysqli_query($conn, $query_editar);


while ($row = mysqli_fetch_assoc($result_editar)) {
  $datos = array(
    "titulo_actividad" => $row["titulo_actividad"],
    "descripcion_actividad" => $row["descripcion_actividad"],
    "archivo" => $row["archivo"],
    "fechaActividad" => $row["fechaActividad"]
  );
}
echo json_encode($datos);
?>
