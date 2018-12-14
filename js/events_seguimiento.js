function eliminarActividad(){
  var tabla = table.row(".selected").data();

  // var url = "../controller/control_admin.php?dato=" + dato;
  if (tabla == null) {
    alert("Seleccione una Actividad");
  }else{
    var dato = {
      "titulo_actividad":tabla[0]
    }

      if (confirm("Seguro que desea eliminar " + dato.titulo_actividad)) {
        $.ajax({
          data:dato,
          url : "../controller/control_seguimiento_eliminar.php",
          type: "POST",
          success:  function (response) {
              alert(response);
              window.location.reload();
              if (!table.data().count()) {
                window.location.href = "../vistas/vista_actividad.php";
              }
          }
        });
      }

  }
}

function finalizarActividad(){
  var tabla = table.row(".selected").data();

  // var url = "../controller/control_admin.php?dato=" + dato;
  if (tabla == null) {
    alert("Seleccione una Actividad");
  }else{
    var dato = {
      "titulo_actividad":tabla[0]
    }
    if (confirm("Seguro que desea dar por finalizado " + dato.titulo_actividad)) {
      $.ajax({
        data:dato,
        url : "../controller/control_seguimiento_finalizar.php",
        type: "POST",
        success:  function (response) {
            alert(response);
            window.location.reload();
            if (!table.data().count()) {
              window.location.href = "../vistas/vista_actividad.php";
            }
        }
      });
    }
  }
}

function nuevaActividad(){
  window.location.href = "../vistas/vista_actividad.php";
}

function mostrarNotaActividad(){
  var tabla = table.row(".selected").data();

  // var url = "../controller/control_admin.php?dato=" + dato;
  if (tabla == null) {
    alert("Seleccione una Actividad");
  }else{
    $('#myModal').modal('toggle');
    var dato = {
      "titulo_actividad":tabla[0]
    }

    $.ajax({
      data:dato,
      url : "../controller/control_seguimiento_mostrar.php",
      type: "POST",
      success:  function (response) {
          $("#txt_titulo").val(response.titulo_actividad);
          $("#txt_nombre_archivo").val(response.archivo);
          $("#dateActividad").val(response.fechaActividad);
          $("#txt_descripcion").val(response.descripcion_actividad);
          $("#txt_subarea").val(response.subarea);
          $("#txt_objetivo").val(response.objetivo);
          $("#txt_actividades_secundarias").val(response.titulo_actividad_secundaria);
          // console.log(response.archivo);
          // console.log(response.fechaActividad);
      }
    });

  }
}
var notas = 0;
function detalles(id_actividad){
  // alert(id_actividad);
  var id = id_actividad;
  var dato = {
    "id_actividad":id
  }

  $.ajax({
    data:dato,
    url : "../controller/control_detalles.php",
    type: "POST",
    success:  function (response) {
      // alert(response.general.subarea);
      if (response.general != null) {
        $('#myModalDetalles').modal('toggle');
        $("#txt_titulo_detalles").val(response.general.titulo_actividad_detalles);
        $("#txt_nombre_archivo_detalles").val(response.general.archivo_detalles);
        $("#dateActividad_detalles").val(response.general.fechaActividad_detalles);
        $("#txt_descripcion_detalles").val(response.general.descripcion_actividad_detalles);
        $("#txt_subarea_detalles").val(response.general.subarea);
        $("#txt_objetivo_detalles").val(response.general.objetivo);
        $("#txt_secundarias_detalles").val(response.general.titulo_actividad_secundaria);

      }
      for (var i = 0; i <= notas; i++) {
        $("#fecha_notas"+i).remove();
        $("#notas"+i).remove();
      }
      for (var i = 0; i < response.cantidad_notas; i++) {
        $("#detalles").append ('<div class="form-group" id="fecha_notas'+ i +'"><span class="col-md-1 col-md-offset-2 text-center">Fecha:</span>'+
                                    '<div class="col-md-2">'+
                                      '<input type="text" class="form-control" name="date_detalles" disabled width="272" value="'+ response.notas[i]["fecha_seguimiento"] +'"/>' +
                                    '</div>'+
                                    '<span class="col-md-1 col-md-2 text-center">Archivo:</span>'+
                                    '<div class="col-md-5">'+
                                      '<input type="text" class="form-control" name="date_detalles" disabled width="272" value="'+ response.notas[i]["archivo_nota"] +'"/>' +
                                    '</div>'+
                                '</div>');
        $("#detalles").append ('<div class="form-group" id="notas'+ i +'"><span class="col-md-1 col-md-offset-2 text-center">Notas:</span><div class="col-md-8">'+
                                      '<textarea class="form-control"  disabled name="txt_notas" placeholder="Ingrese la Nota." rows="2">'+ response.notas[i]["nota_actividad"] +'</textarea>'+
                                      '<hr style="border:3; width:100%;">'+
                                    '</div></div>');
        notas += 1;
      }
    },
    error:function(){
      alert("Error");
    }
  });
}

function agregarNota(){
  var tabla = table.row(".selected").data();
  var nota = $("#txt_notas").val();
  var file_data = document.getElementById('archivo_notas');
  var archivo_notas = file_data.files[0];
  var titulo_actividad = tabla[0];

  var form_data = new FormData();

  if (nota == "") {
    alert("ingrese la nota");
  }else{
    if (tabla == null) {
      alert("Seleccione una Actividad");
    }else{
      form_data.append("titulo_actividad", titulo_actividad);
      form_data.append("nota", nota);
      form_data.append("archivo_notas", archivo_notas);
      // var dato = {
      //   "titulo_actividad":tabla[0],
      //   "nota":nota
      // }
      $.ajax({
        data:form_data,
        url : "../controller/control_agregar_nota.php",
        type: "POST",
        dataType: 'text',
        cache: false,
        contentType: false,
        processData: false,
        success:  function (response) {
            alert(response);
            $('#myModal').modal('toggle');
            $("#txt_notas").val("");
            $("#archivo_notas").val(null);
        }
      });
    }
  }
}

function noAtras() {
    window.location.hash = "no-back-button";
    window.location.hash = "Again-No-back-button" //chrome
    window.onhashchange = function () {
        window.location.hash = "no-back-button";
    }
}
