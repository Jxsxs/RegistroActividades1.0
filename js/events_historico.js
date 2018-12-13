function detallesHistorico(id_actividad){
  var id = id_actividad;
  var dato = {
    "id_actividad":id
  }

  $.ajax({
    data:dato,
    url : "../controller/control_detalles_historico.php",
    type: "POST",
    success:  function (response) {
      // alert(response.general.subarea);
      if (response.general != null) {
        $('#myModalDetallesHistorico').modal('toggle');
        $("#txt_titulo_detalles_historico").val(response.general.titulo_actividad_detalles_historico);
        $("#txt_nombre_archivo_detalles_historico").val(response.general.archivo_detalles_historico);
        $("#dateActividad_detalles_historico").val(response.general.fechaActividad_detalles_historico);
        $("#txt_descripcion_detalles_historico").val(response.general.descripcion_actividad_detalles_historico);
        $("#txt_subarea_detalles_historico").val(response.general.subarea_historico);
        $("#txt_objetivo_detalles_historico").val(response.general.objetivo_historico);
        $("#txt_secundarias_detalles_historico").val(response.general.titulo_actividad_secundaria_historico);
      }else{
        alert("No hay datos!!");
      }
      for (var i = 0; i <= response.cantidad_notas; i++) {
        if ($("#fecha_notas_historico_"+i) != null) {
            $("#fecha_notas_historico_"+i).remove();
        }
        if ($("#notas_historico_"+i) != null) {
            $("#notas_historico_"+i).remove();
        }
      }
      for (var i = 0; i < response.cantidad_notas; i++) {
        $("#detalles_historico").append ('<div class="form-group" id="fecha_notas_historico_' + i + '"><span class="col-md-1 col-md-offset-2 text-center">Fecha:</span><div class="col-md-8">'+
                                      '<input  name="date_detalles" disabled width="276" value="'+ response.notas[i]["fecha_seguimiento"] +'"/>' +
                                    '</div></div>');
        $("#detalles_historico").append ('<div class="form-group" id="notas_historico_'+ i + '"><span class="col-md-1 col-md-offset-2 text-center">Notas:</span><div class="col-md-8">'+
                                      '<textarea class="form-control"  disabled name="txt_notas" placeholder="Ingrese la Nota." rows="2">'+ response.notas[i]["nota_actividad"] +'</textarea>'+
                                    '</div></div>');
        // console.log(response.notas[i]["fecha_seguimiento"]);
        // console.log(response.notas[i]["nota_actividad"]);
      }
    },
    error:function(){
      alert("Error ");
    }
  });
}

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
          url : "../controller/control_historico_eliminar.php",
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
