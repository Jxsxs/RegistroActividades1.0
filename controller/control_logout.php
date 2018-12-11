<?php
session_start();
// $ingreso = $_SESSION["ingreso"];
session_destroy();
header("location: ../vistas/vista_login.php");

?>
