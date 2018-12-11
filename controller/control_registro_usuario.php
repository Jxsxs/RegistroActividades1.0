<?php
include "../database/conexion.php";
session_start();
$id_usuario = $_SESSION["id_user"];
// echo "<script>console.log('". $id_usuario ."')</script>";

if (isset($_POST["btn_registro"])) {
  // echo "<script>alert(". $id_usuario .")</script>";
  $nombre = $_POST["txt_nombre"];
  $apellido = $_POST["txt_apellido"];
  $correo = $_POST["txt_correo"];
  $telefono = $_POST["txt_telefono"];
  $area = $_POST["select_area"];


  $query_registro = "insert into datos_usuario (id_usuario, id_area, nombre, apellido, correo, telefono) values ('".$id_usuario."','".$area."', '".$nombre."', '".$apellido."', '".$correo."', '".$telefono."')";
  $query_update = "update usuario set registrado=1 where id_usuario=" . $id_usuario;

  if ($conn->query($query_registro) === TRUE) {
    if ($conn->query($query_update) === TRUE) {
      header("Location: ../vistas/vista_actividad.php");
    }else{
      echo "Error en el registro " . $conn->error;
    }
  }else {
    echo "Error en el registro " . $conn->error;
  }
}
?>
