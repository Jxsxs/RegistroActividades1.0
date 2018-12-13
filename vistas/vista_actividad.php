<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../js/events_actividad.js"></script>
    <script src="../js/events_seguimiento.js"></script>
    <!-- <link href="../css/login.css" media="screen" rel="StyleSheet" type="text/css"> -->

    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/actividades.css" rel="stylesheet">
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

    <title></title>
  </head>
  <body onload="noAtras()" >

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
         <li><a href="../vistas/vista_no_finalizado.php"><span class=""></span> Seguimiento</a></li>
         <li><a href="../controller/control_logout.php"><span class="glyphicon glyphicon-log-out"></span> Salir</a></li>
         <!-- <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Login</a></li> -->
       </ul>
     </div>
    </nav>

    <div class="container">
      <div class="row">
          <div class="col-md-12">
              <div class="well well-sm">
                  <form class="form-horizontal" method="post">
                      <fieldset>
                        <!-- <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"> -->
                          <legend class="text-center header">Actividad</legend>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Titulo:</span>
                              <div class="col-md-8">
                                  <input id="txt_titulo" name="txt_titulo" required type="text" placeholder="Titulo de Actividad" class="form-control">
                              </div>
                          </div>
                        <!-- </form> -->
                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Archivo:</span>
                            <div class="col-md-8">
                              <!-- <label for="ejemplo_archivo_1">Archivo</label> -->
                              <!-- <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"> -->
                                <input type="file" name="file" id="archivo" accept=".jpg,.png,.docx,.xslx,.pptx,.pdf">
                              <!-- </form> -->
                            </div>
                          </div>
                          <!-- <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" enctype="multipart/form-data"> -->
                          <div class="form-group">
                            <span class="col-md-1 col-md-offset-2 text-center">Fecha actividad:</span>
                            <div class="col-md-8">
                              <input id="dateActividad" name="date" required width="276" />
                            </div>
                          </div>


                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Finalizado:</span>
                              <div class="col-md-8">
                                <input type="checkbox" id="chkFinalizado" name="chkFinalizado" class="form-check-input" value=""/>
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Subarea:</span>
                              <div class="col-md-4">
                                <select name="select_subarea" class="form-control form-control-lg" id="select_subarea" onchange="actividades_secundarias(this);">
                                  <option selected>Subarea:</option>
                                  <?php
                                    include "../controller/control_subareas.php";
                                  ?>
                                </select>
                              </div>
                              <div class="col-md-4">
                                <select name="select_actividades_secundarias" class="form-control form-control-lg" id="select_actividades_secundarias" >
                                </select>
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Descripción</span>
                              <div class="col-md-8">
                                  <textarea class="form-control" id="txt_descripcion" required name="txt_descripcion" placeholder="Ingrese la descripcion de la actividad." rows="4"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Objetivo</span>
                              <div class="col-md-8">
                                  <textarea class="form-control" id="txt_objetivo" required name="txt_objetivo" placeholder="Ingrese el objetivo de la actividad." rows="2"></textarea>
                              </div>
                          </div>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center"></span>
                              <div class="col-md-8">
                                  <span id="resultado"></span>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-12 text-center">
                                  <button type="button" id="btn_guardar" name="btn_guardar" class="btn btn-primary btn-lg" onclick="enviaDatos()">Guardar</button>
                              </div>
                          </div>

                          <!-- </form> -->
                      </fieldset>
                  </form>
              </div>
          </div>
      </div>
    </div>
    <script>
        $('#dateRegistro').datepicker({
            uiLibrary: 'bootstrap'
        });
        $('#dateActividad').datepicker({
            uiLibrary: 'bootstrap'
        });
    </script>
  </body>
</html>
