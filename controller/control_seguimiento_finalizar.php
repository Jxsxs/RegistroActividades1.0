<?php
include "../database/conexion.php";
$titulo_actividad = $_POST["titulo_actividad"];

$query_finalizar = "update actividades set finalizado=1 where titulo_actividad='" . $titulo_actividad . "'";
if (mysqli_query($conn,$query_finalizar) === TRUE) {
  echo "Finalizado";
}else{
  echo "No se pudo finalizar";
}

 ?>
