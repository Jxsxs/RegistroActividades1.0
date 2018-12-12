function enviaDatos(){

  // ====Valores almacenados en variables obtenidos de los elementos del DOM===
    var titulo = document.getElementById('txt_titulo').value;
    var fechaActividad = document.getElementById('dateActividad').value;
    var finalizado = 0;
    var descripcion = document.getElementById('txt_descripcion').value;
    if (document.getElementById('chkFinalizado').checked === true) {
      finalizado = 1;
    }
    var id_subarea = $("#select_subarea option:selected").val();
    var id_actividad_secundaria = $("#select_actividades_secundarias option:selected").val();
    var objetivo = $("#txt_objetivo").val();
    var file_data = $('#archivo').prop('files')[0];
    // ===============================================================

    // ####Se crea el form data donde se integran todas las variables declaradas e inicializadas antes#####
    var form_data = new FormData();
    form_data.append('archivo', file_data);
    form_data.append("titulo", titulo);
    form_data.append("fechaActividad", fechaActividad);
    form_data.append("finalizado", finalizado);
    form_data.append("descripcion", descripcion);
    form_data.append("id_subarea", id_subarea);
    form_data.append("objetivo", objetivo);
    form_data.append("id_actividad_secundaria", id_actividad_secundaria);
    // ########################################################################


    $.ajax({
        url: "../controller/control_actividad.php", // point to server-side PHP script
        dataType: 'text',  // what to expect back from the PHP script, if anything
        cache: false,
        contentType: false,
        processData: false,
        data: form_data,
        type: 'post',
        success: function(response){
            alert(response); // display response from the PHP script, if any
            $("#txt_titulo").val("");
            $("#txt_descripcion").val("");
            location.reload();
        }
     });
}

function actividades_secundarias(id_subarea){
  // var id_subarea = $("#select_subarea option:selected").val();
  // alert(id_subarea.value);
  var dato = {
    "id_subarea":id_subarea.value
  }
  if (id_subarea.value>0) {
    $.ajax({
      data:dato,
      url : "../controller/control_actividades_secundarias.php",
      type: "POST",
      success:  function (response) {
        $("#select_actividades_secundarias").empty();
        for (var i = 0; i < response.length; i++) {
          $("#select_actividades_secundarias").append("<option value='" + response[i].id_actividad_secundaria + "'>"+ response[i].titulo +"</option>");
        }
      },
      error:function(){
        alert("Error");
      }
    });
  }else{
      $("#select_actividades_secundarias").empty();
  }

}
