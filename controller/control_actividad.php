<?php
include "../database/conexion.php";

session_start();
$id_usuario = $_SESSION["id_user"];

$titulo = $_POST["titulo"];
$id_subarea = $_POST["id_subarea"];
$objetivo =$_POST["objetivo"];
$id_actividad_secundaria = $_POST["id_actividad_secundaria"];

// echo "<script>alert(" . $titulo . ")</script>";
$fechaActividad = $_POST["fechaActividad"];
$finalizado = $_POST["finalizado"];
$descripcion = $_POST["descripcion"];

$format_fecha_actividad = date_create($fechaActividad);
$fecha_correcta_actividad = date_format($format_fecha_actividad, 'Y-m-d');

//==================== ARCHIVO =================
if (isset($_FILES["archivo"]["name"])) {
  $nombreArchivo = $_FILES["archivo"]["name"];
  $nombreTmpArchivo = $_FILES["archivo"]["tmp_name"];
  $tamañoArchivo = $_FILES["archivo"]["size"];
  $tamañoTotal = round((($tamañoArchivo) / 1000000), 2);
  $trozos = explode(".", $nombreArchivo);
  $ext = end($trozos);
}else{
  $nombreArchivo = "";
}

// echo $nombreArchivo . ' - ' .$tamañoTotal . "Mb";
// ==================================================
$query_actividad = "insert into actividades (id_usuario, id_subarea, id_actividad_secundaria, titulo_actividad, descripcion_actividad,objetivo_actividad, archivo, fechaActividad, finalizado) values ('".$id_usuario."', '".$id_subarea."', '".$id_actividad_secundaria."', '".$titulo."', '".$descripcion."', '".$objetivo."', '".$nombreArchivo."', '".$fecha_correcta_actividad."', '".$finalizado."')";
$query_busca_usuario = "select usuario from usuario where id_usuario = " . $id_usuario;
$result_busca_usuario = mysqli_query($conn, $query_busca_usuario);

$usuario = "";
if (mysqli_num_rows($result_busca_usuario) > 0) {
  while ($row = mysqli_fetch_assoc($result_busca_usuario)) {
    $usuario = $row["usuario"];
  }

  if ($nombreArchivo == "") {
    if ($conn->query($query_actividad) === TRUE) {
         echo "Actividad Agregada " . $usuario;
    }else {
      echo "Error al agregar " . $conn->error;
    }
  }else{
    if ($ext == "jpg" || $ext == "png" || $ext == "docx" || $ext == "xslx" || $ext == "pdf") {
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
        echo "Error al agregar " . $conn->error;
      }
      // echo $titulo . "<br>" . $fecha. "<br>" . $finalizado. "<br>" . $descripcion;
    }else{
      echo "Archivo invalido";

    }

  }
}else{
  echo "Ingrese desde Login";
}






 ?>
