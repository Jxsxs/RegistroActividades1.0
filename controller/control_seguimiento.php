<?php
include "../database/conexion.php";

session_start();
$id_user = $_SESSION["id_user"];

$query_seguimiento = "select a.id_actividad, a.titulo_actividad, a.descripcion_actividad, a.fechaRegistroActividad from usuario join actividades as a on usuario.id_usuario = a.id_usuario
where a.finalizado = 0 and usuario.id_usuario =" . $id_user;

$result_seguimiento = mysqli_query($conn,$query_seguimiento);
  while ($row = mysqli_fetch_assoc($result_seguimiento)) {
    $id_actividad = $row["id_actividad"];
    echo "
    <tr>
      <td>" . $row["titulo_actividad"] . "</td>
      <td>" . $row["descripcion_actividad"] . "</td>
      <td>" . $row["fechaRegistroActividad"] . "</td>" .
      '<td><button type="button" class="btn btn-warning" name="btn-datos" id="btn-datos" onclick="detalles(' . $id_actividad . ');">Detalles</button></td>
    </tr>';
  }



 ?>
