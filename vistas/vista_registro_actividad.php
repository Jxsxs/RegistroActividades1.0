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
                          <legend class="text-center header">Registro</legend>
                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Nombre:</span>
                              <div class="col-md-8">
                                  <input id="fname" name="txt_nombre" required type="text" placeholder="Nombre" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Apellido:</span>
                              <div class="col-md-8">
                                  <input id="fname" name="txt_apellido" required type="text" placeholder="Apellido" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Correo:</span>
                              <div class="col-md-8">
                                  <input id="fname" name="txt_correo"  required type="email" placeholder="Correo" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Telefono:</span>
                              <div class="col-md-8">
                                  <input id="fname" name="txt_telefono" required type="text" placeholder="Telefono" class="form-control">
                              </div>
                          </div>

                          <div class="form-group">
                              <span class="col-md-1 col-md-offset-2 text-center">Área:</span>
                              <div class="col-md-8">
                                <select name="select_area" class="form-control form-control-lg">
                                  <option selected>Area:</option>
                                  <?php
                                    include "../controller/control_area.php";
                                  ?>
                                </select>
                              </div>
                          </div>
                          <div class="form-group">
                              <div class="col-md-12 text-center">
                                  <button type="submit" name="btn_registro" class="btn btn-primary btn-lg">Registro</button>
                              </div>
                          </div>

                        </form>

                      </fieldset>
                  </form>
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
