<?php
include "../database/conexion.php";
header("Content-Type: application/json; charset=UTF-8");

$id_actividad = $_POST["id_actividad"];
// echo "id: " . $id_actividad;

$query_detalles = "select a.titulo_actividad, a.descripcion_actividad,a.objetivo_actividad, a.archivo, a.fechaActividad, sub.subarea, sec.titulo from actividades as a join
subareas as sub on a.id_subarea = sub.id_subarea join actividades_secundarias as sec on a.id_actividad_secundaria = sec.id_actividad_secundaria where a.id_actividad = " . $id_actividad;
$result_detalles = mysqli_query($conn, $query_detalles);

$query_detalles_notas = "select s.fecha_seguimiento, s.nota_actividad, s.archivo_nota from actividades as a join
seguimiento as s on a.id_actividad=s.id_actividad where a.id_actividad=" . $id_actividad;
$result_detalles_notas = mysqli_query($conn, $query_detalles_notas);

$detalles = null;
if (mysqli_num_rows($result_detalles) > 0) {
  while ($row = mysqli_fetch_assoc($result_detalles)) {
    $detalles = array(
      "titulo_actividad_detalles" => $row["titulo_actividad"],
      "descripcion_actividad_detalles" => $row["descripcion_actividad"],
      "archivo_detalles" => $row["archivo"],
      "fechaActividad_detalles" => $row["fechaActividad"],
      "subarea" => $row["subarea"],
      "objetivo" => $row["objetivo_actividad"],
      "titulo_actividad_secundaria" => $row["titulo"]
    );
  }
}
$detalles_notas = null;
$cantidad_notas = mysqli_num_rows($result_detalles_notas);
if ($cantidad_notas > 0) {
  while ($row = mysqli_fetch_assoc($result_detalles_notas)) {
    $detalles_notas[] = $row;
  }
}

// echo $cantidad_notas;
// echo $detalles;
echo json_encode(Array("general" => $detalles, "notas" => $detalles_notas, "cantidad_notas" => $cantidad_notas));

 ?>
