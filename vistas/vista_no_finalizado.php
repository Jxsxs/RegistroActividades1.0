<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">

    <link href="../css/seguimiento.css" media="screen" rel="StyleSheet" type="text/css">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sl-1.2.6/datatables.min.css"/>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

    <title></title>
  </head>
  <body>
    <nav class="navbar navbar-inverse">
     <div class="container">
       <div class="navbar-header">
         <a class="navbar-brand" href="#"></a>
       </div>
       <ul class="nav navbar-nav">
         <!-- <li class="active"><a href="#"></a></li>
         <li><a href="#">Page 1</a></li>
         <li><a href="#">Page 2</a></li> -->
       </ul>
       <ul class="nav navbar-nav navbar-right">
         <li><a href="../controller/control_logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
         <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
       </ul>
     </div>
    </nav>
    <div class="container">
      <table class="table table-striped" id="tabla">
        <thead>
          <tr>
            <th>Actividad</th>
            <th>Descripcion</th>
            <th>Fecha</th>
            <th></th>
          </tr>
        </thead>
        <tbody>
          <?php include "../controller/control_seguimiento.php"; ?>
        </tbody>
      </table>
      <div class="form-group" style="align-items:right">
        <button type="submit" class="btn btn-primary right" name="btn-editar" id="btn-editar" onclick="mostrarNotaActividad()">Agregar Nota</button>
        <button type="submit" class="btn btn-primary right" name="btn-finalizar" id="btn-finalizar" onclick="finalizarActividad()">Finalizar Actividad</button>
        <button type="submit" class="btn btn-primary right" name="btn-nueva" id="btn-nueva" onclick="nuevaActividad()">Nueva Actividad</button>
        <button type="submit" class="btn btn-danger right" name="btn-eliminar" id="btn-eliminar" onclick="eliminarActividad()">Eliminar Actividad</button>
      </div>

      <!-- ================================MODAL PARA AGREGAR NOTA====================================== -->
      <div class="modal fullscreen-modal fade" id="myModal">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- <div class="modal-body"> -->
              <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" method="post">
                                <legend class="text-center header">Detalles de Actividad</legend>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center">Titulo:</span>
                                    <div class="col-md-8">
                                        <input id="txt_titulo" name="txt_titulo"  disabled type="text" placeholder="Titulo de Actividad" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center">Archivo:</span>
                                  <div class="col-md-8">
                                    <input id="txt_nombre_archivo" name="txt_nombre_archivo"  disabled type="text" class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center">Fecha actividad:</span>
                                  <div class="col-md-8">
                                    <input id="dateActividad" name="date" disabled width="276" />
                                  </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center">Descripcion:</span>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="txt_descripcion" disabled name="txt_descripcion" placeholder="" rows="3"></textarea>
                                    </div>
                                </div>
                                <legend class="text-center header">Nota</legend>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center">Notas:</span>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="txt_notas" required name="txt_notas" placeholder="Ingrese la Nota." rows="7"></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-12 text-center">
                                        <button type="button" id="btn_guardar_nota" name="btn_guardar_nota" class="btn btn-primary btn-lg" onclick="agregarNota()">Agregar Nota</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>
      <!-- ========================FIN DEL MODAL AGREGAR NOTA========================================= -->

      <!-- ===================================MODAL DETALLES=========================================== -->
      <div class="modal fullscreen-modal fade" id="myModalDetalles">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <button type="button" class="close" data-dismiss="modal">&times;</button>
            </div>
            <!-- <div class="modal-body"> -->
              <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <div class="well well-sm">
                            <form class="form-horizontal" method="post" id="detalles">
                                <legend class="text-center header">Detalles de Actividad</legend>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center">Titulo:</span>
                                    <div class="col-md-8">
                                        <input id="txt_titulo_detalles" name="txt_titulo_detalles"  disabled type="text" placeholder="Titulo de Actividad" class="form-control">
                                    </div>
                                </div>
                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center">Archivo:</span>
                                  <div class="col-md-8">
                                    <input id="txt_nombre_archivo_detalles" name="txt_nombre_archivo_detalles"  disabled type="text" class="form-control">
                                  </div>
                                </div>
                                <div class="form-group">
                                  <span class="col-md-1 col-md-offset-2 text-center">Fecha actividad:</span>
                                  <div class="col-md-8">
                                    <input id="dateActividad_detalles" name="date_detalles" disabled width="276" />
                                  </div>
                                </div>
                                <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center">Descripcion:</span>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="txt_descripcion_detalles" disabled name="txt_descripcion_detalles" placeholder="" rows="3"></textarea>
                                    </div>
                                </div>
                                <legend class="text-center header">Notas</legend>
                                <!-- <div class="form-group">
                                    <span class="col-md-1 col-md-offset-2 text-center">Notas:</span>
                                    <div class="col-md-8">
                                        <textarea class="form-control" id="txt_notas" required name="txt_notas" placeholder="Ingrese la Nota." rows="7"></textarea>
                                    </div>
                                </div> -->
                            </form>
                        </div>
                    </div>
                </div>
            </div>
          </div>
        </div>
      </div>

      <!-- ==================================FIN MODAL DETALLES======================================== -->
  </body>
  <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
  <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
  <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
  <!-- <script src="//code.jquery.com/jquery-1.11.1.min.js"></script> -->
  <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/v/bs4/dt-1.10.18/r-2.2.2/sl-1.2.6/datatables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
  <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.2.3/js/dataTables.responsive.min.js"></script>
  <script src="../js/events_seguimiento.js"></script>
  <script>
    var table = "";
    $(document).ready(function() {
      table = $('#tabla').DataTable();
      $('#tabla tbody').on( 'click', 'tr', function () {
          if ( $(this).hasClass('selected') ) {
              $(this).removeClass('selected');
          }
          else {
              table.$('tr.selected').removeClass('selected');
              $(this).addClass('selected');
          }
      } );
    } );
  </script>
</html>
