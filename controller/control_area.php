<?php
include "../database/conexion.php";
$query_areas = "select id_area, nombre_area from areas";
$result = $conn->query($query_areas);
while($row = $result->fetch_assoc()) {
  echo "<option value='". $row["id_area"] . "'>". $row["nombre_area"] ."</option>";
}
?>
