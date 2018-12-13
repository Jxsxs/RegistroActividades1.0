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
        $('#myModalDetalles').modal('toggle');
        $("#txt_titulo_detalles").val(response.general.titulo_actividad_detalles);
        $("#txt_nombre_archivo_detalles").val(response.general.archivo_detalles);
        $("#dateActividad_detalles").val(response.general.fechaActividad_detalles);
        $("#txt_descripcion_detalles").val(response.general.descripcion_actividad_detalles);
        $("#txt_subarea_detalles").val(response.general.subarea);
        $("#txt_objetivo_detalles").val(response.general.objetivo);
        $("#txt_secundarias_detalles").val(response.general.titulo_actividad_secundaria);

        for (var i = 0; i <= response.cantidad_notas; i++) {
          if ($("#fecha_notas_"+i) != null) {
              $("#fecha_notas_"+i).remove();
          }
          if ($("#notas_"+i) != null) {
              $("#notas_"+i).remove();
          }
        }
        for (var i = 0; i < response.cantidad_notas; i++) {
          $("#detalles").append ('<div class="form-group" id="fecha_notas_'+ i +'"><span class="col-md-1 col-md-offset-2 text-center">Fecha:</span><div class="col-md-8">'+
                                        '<input  name="date_detalles" disabled width="276" value="'+ response.notas[i]["fecha_seguimiento"] +'"/>' +
                                      '</div></div>');
          $("#detalles").append ('<div class="form-group" id="notas_'+ i +'"><span class="col-md-1 col-md-offset-2 text-center">Notas:</span><div class="col-md-8">'+
                                        '<textarea class="form-control"  disabled name="txt_notas" placeholder="Ingrese la Nota." rows="2">'+ response.notas[i]["nota_actividad"] +'</textarea>'+
                                      '</div></div>');
          // console.log(response.notas[i]["fecha_seguimiento"]);
          // console.log(response.notas[i]["nota_actividad"]);
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
  // alert(nota)
  if (nota == "") {
    alert("ingrese la nota");
  }else{
    if (tabla == null) {
      alert("Seleccione una Actividad");
    }else{
      var dato = {
        "titulo_actividad":tabla[0],
        "nota":nota
      }
      $.ajax({
        data:dato,
        url : "../controller/control_agregar_nota.php",
        type: "POST",
        success:  function (response) {
            alert(response);
            $('#myModal').modal('toggle');
            $("#txt_notas").val("");
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
