<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://code.jquery.com/jquery-migrate-1.2.1.min.js"></script>
    <script src="../js/events_login.js"></script>
    <!-- <link href="../css/login.css" media="screen" rel="StyleSheet" type="text/css"> -->

    <!------ Include the above in your HEAD tag ---------->
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link href="../css/login.css" rel="stylesheet">
    <link href="https://unpkg.com/gijgo@1.9.11/css/gijgo.min.css" rel="stylesheet" type="text/css" />
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
    <script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
    <script src="https://unpkg.com/gijgo@1.9.11/js/gijgo.min.js" type="text/javascript"></script>
    <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet">

    <title>Login Actividades</title>
  </head>
  <body>
    <div class="container">
    	<div class="card card-container">
    	  <h2><strong>Login Actividades </strong><br/></h2><br/>
    		<!-- <div class="col-md-12"> -->
        <form role="form" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" method="post" class="">
          <div class="form-group">
            <label for="exampleInputEmail1">User</label>
            <input type="text" class="form-control" name="txt_user" id="txt_user" placeholder="Enter user">
          </div>
          <div class="form-group">
            <label for="exampleInputPassword1">Password</label>
            <input type="password" class="form-control" name="txt_pass" id="txt_pass" placeholder="Password">
          </div>
          <div class="form-check">
            <button class="btn btn-info" type="button" name="showpassword" id="showpassword" value="Show Password">Show password</button>
            <button type="submit" name="btn_login" class="btn btn-primary">Login</button>
          </div>
    		</form>
        <?php include "../controller/control_login.php"; ?>
    	</div>
    </div>
  </body>
</html>
