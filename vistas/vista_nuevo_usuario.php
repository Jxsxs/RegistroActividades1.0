<?php   include "../controller/control_registro_usuario.php";?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>

    <!-- <link href="../css/login.css" media="screen" rel="StyleSheet" type="text/css"> -->

    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/actividades.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>

    <!-- <script src="js/events.js"></script> -->
    </script>
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
         <li><a href="vista_actividad.php"><span class=""></span> Nueva Actividad</a></li>
         <li><a href="vista_no_finalizado.php"><span class=""></span> Seguimiento</a></li>
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
                        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="">
                          <legend class="text-center header">Registro Nuevo Usuario</legend>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Usuario:</span>
                              <div class="col-md-8">
                                  <input id="fname" name="txt_usuario" required type="text" placeholder="Usuario" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Contraseña:</span>
                              <div class="col-md-8">
                                  <input id="fname" name="txt_pass" required type="password" placeholder="Contraseña" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Tipo:</span>
                              <div class="col-md-8">
                                <select name="select_tipo_usuario" class="form-control form-control-lg">
                                  <option value="3" selected>Tipo de Usuario:</option>
                                  <option value="0">Usuario</option>
                                  <option value="1">Administrador</option>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-12 text-center">
                                  <button type="submit" name="btn_crear_usuario" class="btn btn-primary btn-lg">Crear</button>
                              </div>
                          </div>
                        </form>
                      </fieldset>
                  </form>
                  <?php include "../controller/control_nuevo_usuario.php"; ?>
              </div>
          </div>
      </div>
    </div>
    <script>
        $('#datepicker').datepicker({
            uiLibrary: 'bootstrap'
        });
    </script>

  </body>
</html>
