<?php
include "../database/conexion.php";
header("Content-Type: application/json; charset=UTF-8");

$titulo_actividad = $_POST["titulo_actividad"];

$query_editar = "select a.titulo_actividad, a.descripcion_actividad,a.objetivo_actividad, a.archivo, a.fechaActividad, sub.subarea, sec.titulo from actividades as a join
subareas as sub on a.id_subarea = sub.id_subarea join actividades_secundarias as sec on sub.id_subarea = sec.id_subarea where a.titulo_actividad='" . $titulo_actividad . "'";
$result_editar = mysqli_query($conn, $query_editar);


while ($row = mysqli_fetch_assoc($result_editar)) {
  $datos = array(
    "titulo_actividad" => $row["titulo_actividad"],
    "descripcion_actividad" => $row["descripcion_actividad"],
    "archivo" => $row["archivo"],
    "fechaActividad" => $row["fechaActividad"],
    "subarea" => $row["subarea"],
    "objetivo" => $row["objetivo_actividad"],
    "titulo_actividad_secundaria" => $row["titulo"]
  );
}
echo json_encode($datos);
?>
