<?php
include "../database/conexion.php";

session_start();
$id_usuario = $_SESSION["id_user"];

$query_tipo_usuario = "select tipo from usuario where id_usuario=" . $id_usuario;
$result_tipo_usuario = mysqli_query($conn, $query_tipo_usuario);

while ($row = mysqli_fetch_assoc($result_tipo_usuario)) {
  echo $row["tipo"];
}
 ?>
