<?php
include "../database/conexion.php";

if (isset($_POST["btn_crear_usuario"])) {
  $user = $_POST["txt_usuario"];
  $pass = $_POST["txt_pass"];
  $tipo_usuario = $_POST["select_tipo_usuario"];
  if ($tipo_usuario != 3) {
    $query_nuevo_usuario = "insert into usuario (usuario, pass, tipo) values ('". $user ."', '". $pass ."', ". $tipo_usuario .")";
    if (mysqli_query($conn, $query_nuevo_usuario) === TRUE) {
         echo "<script>alert('Usuario: " . $user . " creado');</script>";
    }else {
      echo "<script>alert('Error al agregar: " . $user . " ". $conn->error ."');</script> ";
    }
  }
  else{

  }
}
?>
