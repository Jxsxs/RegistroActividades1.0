<?php
include "../database/conexion.php";

$query_subareas = "select * from subareas";
$result_subareas = mysqli_query($conn, $query_subareas);

while ($row = mysqli_fetch_assoc($result_subareas)) {
  echo "<option value='". $row["id_subarea"] . "'>". $row["subarea"] ."</option>";
}


 ?>
