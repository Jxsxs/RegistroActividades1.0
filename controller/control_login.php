<?php
include "../database/conexion.php";
session_start();
if (isset($_POST["btn_login"])) {
  $user = $_POST["txt_user"];
  $pass = $_POST["txt_pass"];
  // echo "Hola: " . $user. " con pass " . $pass;

  $query_buscar = "select * from usuario where usuario = '". $user . "' and pass = '" . $pass . "'";
  $result_buscar = mysqli_query($conn,$query_buscar);



  if (mysqli_num_rows($result_buscar) > 0) {
    while ($row = mysqli_fetch_assoc($result_buscar)) {
      $query_seguimiento = "select a.titulo_actividad, a.descripcion_actividad, a.fechaRegistroActividad from usuario join actividades as a on usuario.id_usuario = a.id_usuario
      where a.finalizado = 0 and usuario.id_usuario =" . $row["id_usuario"];
      $result_seguimiento = mysqli_query($conn, $query_seguimiento);
      // $_SESSION["hola"] = "adios";
      $_SESSION["id_user"] = $row["id_usuario"];
      // echo "<script>alert(". $row["id_usuario"] .")</script>";
      $_SESSION["ingreso"] = 1;
      if ($row["registrado"] == 1) {
        if (mysqli_num_rows($result_seguimiento) > 0) {
          header("location: ../vistas/vista_no_finalizado.php");

        }else{
          header("location: ../vistas/vista_actividad.php");
        }

      }else{
        // echo "<script>alert(". $_SESSION["id_user"] .")</script>";
        header("location: ../vistas/vista_registro_actividad.php"  );
      }
    }
  }else{
    echo "<script>alert('Usuario no registardo')</script>";
  }
}




 ?>
