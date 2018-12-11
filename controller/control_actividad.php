<?php
include "../database/conexion.php";

session_start();
$id_usuario = $_SESSION["id_user"];

$titulo = $_POST["titulo"];

// echo "<script>alert(" . $titulo . ")</script>";
$fechaActividad = $_POST["fechaActividad"];
$finalizado = $_POST["finalizado"];
$descripcion = $_POST["descripcion"];

$format_fecha_actividad = date_create($fechaActividad);
$fecha_correcta_actividad = date_format($format_fecha_actividad, 'Y-m-d');

//==================== ARCHIVO =================
$nombreArchivo = $_FILES["archivo"]["name"];
$nombreTmpArchivo = $_FILES["archivo"]["tmp_name"];
$tamañoArchivo = $_FILES["archivo"]["size"];
$tamañoTotal = round((($tamañoArchivo) / 1000000), 2);
$trozos = explode(".", $nombreArchivo);
$ext = end($trozos);
// echo $nombreArchivo . ' - ' .$tamañoTotal . "Mb";
// ==================================================

if ($ext == "jpg" || $ext == "png" || $ext == "docx" || $ext == "xslx" || $ext == "pdf") {
  $query_actividad = "insert into actividades (id_usuario, titulo_actividad, descripcion_actividad,archivo, fechaActividad, finalizado) values ('".$id_usuario."', '".$titulo."', '".$descripcion."', '".$nombreArchivo."', '".$fecha_correcta_actividad."', '".$finalizado."')";
  $query_busca_usuario = "select usuario from usuario where id_usuario = " . $id_usuario;
  $result_busca_usuario = mysqli_query($conn, $query_busca_usuario);

  $usuario = "";
  if (mysqli_num_rows($result_busca_usuario) > 0) {
    while ($row = mysqli_fetch_assoc($result_busca_usuario)) {
      $usuario = $row["usuario"];
    }
  }

  if ($conn->query($query_actividad) === TRUE) {
      $add = "../archivos_locales/" . $nombreArchivo;
     if (move_uploaded_file($nombreTmpArchivo, $add)) {
         chmod($add, 0666);
         header('refresh:2');
         echo "Actividad Agregada " . $usuario;
     } else {
         echo "Error al subir el archivo<br>";
     }

  }else {
    echo "Error al agregar" . $conn->error;
  }
  // echo $titulo . "<br>" . $fecha. "<br>" . $finalizado. "<br>" . $descripcion;
}else{
  echo "Archivo invalido";

}


 ?>
