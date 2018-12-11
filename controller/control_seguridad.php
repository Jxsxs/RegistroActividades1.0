<?php
session_start();
$ingreso = $_SESSION["ingreso"];
if ($ingreso != 1) {
  session_destroy();
  header("location: ../vistas/vista_login.php");
}


 ?>
