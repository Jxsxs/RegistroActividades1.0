function enviaDatos(){
    var titulo = document.getElementById('txt_titulo').value;
    var fechaActividad = document.getElementById('dateActividad').value;
    var finalizado = 0;
    var descripcion = document.getElementById('txt_descripcion').value;
    if (document.getElementById('chkFinalizado').checked === true) {
      finalizado = 1;
    }
    var file_data = $('#archivo').prop('files')[0];
    var form_data = new FormData();
    form_data.append('archivo', file_data);
    form_data.append("titulo", titulo);
    form_data.append("fechaActividad", fechaActividad);
    form_data.append("finalizado", finalizado);
    form_data.append("descripcion", descripcion);
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
            location.reload();
        }
     });
}
