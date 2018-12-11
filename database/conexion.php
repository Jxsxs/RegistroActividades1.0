<?php
$conn = new mysqli('localhost', 'root', '', 'actividades');

// ¡Oh, no! Existe un error 'connect_errno', fallando así el intento de conexión
if ($conn->connect_errno) {
  echo "No se realizo la conexion";
}
?>
