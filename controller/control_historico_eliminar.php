<?php
include "../database/conexion.php";
$titulo_actividad = $_POST["titulo_actividad"];
// echo "Titulo: " . $titulo_actividad;

$query_eliminar_actividad = "delete from actividades where titulo_actividad='" . $titulo_actividad . "'";

if (mysqli_query($conn,$query_eliminar_actividad) === TRUE) {
    echo "Actividad eliminada!!";
} else {
    echo "Error eliminando: " . $conn->error;
}

 ?>
