<?php
include "../database/conexion.php";

$titulo_actividad = $_POST["titulo_actividad"];
$nota = $_POST["nota"];

$query_actividad = "select id_actividad from actividades where titulo_actividad = '" . $titulo_actividad . "'";
$result_actividad = mysqli_query($conn,$query_actividad);

$row = mysqli_fetch_assoc($result_actividad);
$id_actividad = $row["id_actividad"];

$query_guarda_nota = "insert into seguimiento (id_actividad, nota_actividad) values (". $id_actividad .", '". $nota ."')";
if ($conn->query($query_guarda_nota) === TRUE) {
  echo "Nota guardada";
}else{
  echo "No se guardo la nota";
}

?>
