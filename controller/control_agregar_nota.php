<?php
include "../database/conexion.php";
session_start();
$id_usuario = $_SESSION["id_user"];
$titulo_actividad = $_POST["titulo_actividad"];
$nota = $_POST["nota"];

if (isset($_FILES["archivo_notas"]["name"])) {
  $nombreArchivo = $_FILES["archivo_notas"]["name"];
  $nombreTmpArchivo = $_FILES["archivo_notas"]["tmp_name"];
  $tamañoArchivo = $_FILES["archivo_notas"]["size"];
  $tamañoTotal = round((($tamañoArchivo) / 1000000), 2);
  $trozos = explode(".", $nombreArchivo);
  $ext = end($trozos);
}else{
  $nombreArchivo = "";
}

$query_actividad = "select id_actividad, fechaActividad from actividades where titulo_actividad = '" . $titulo_actividad . "'";
$result_actividad = mysqli_query($conn,$query_actividad);

$row = mysqli_fetch_assoc($result_actividad);
$id_actividad = $row["id_actividad"];
$query_guarda_nota = "insert into seguimiento (id_actividad, nota_actividad, archivo_nota) values (". $id_actividad .", '". $nota ."', '" . $id_usuario . "_" .$row["fechaActividad"] . "_" . $nombreArchivo ."')";


if ($nombreArchivo == "") {
  if ($conn->query($query_guarda_nota) === TRUE) {
    echo "Nota guardada";
  }else{
    echo "No se guardo la nota";
  }
}else{
  if ($ext == "jpg" || $ext == "png" || $ext == "docx" || $ext == "xslx" || $ext == "pdf" || $ext == "PDF") {
    if ($conn->query($query_guarda_nota) === TRUE) {
        $add = "../archivos_locales/archivos_notas/" . $id_usuario . "_" .$row["fechaActividad"] . "_" . $nombreArchivo;
       if (move_uploaded_file($nombreTmpArchivo, $add)) {
           chmod($add, 0666);
           echo "Nota guardada";
       } else {
           echo "Error al subir el archivo<br>";
       }

    }else {
      echo "No se guardo la nota " . $conn->error;
    }
    // echo $titulo . "<br>" . $fecha. "<br>" . $finalizado. "<br>" . $descripcion;
  }else{
    echo "Archivo invalido";

  }
}
?>
