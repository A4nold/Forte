<?php 
$dbconnect = mysqli_connect("localhost", "root", "", "registration") or die("Couldnt establish database connection !!!");
session_start();

// var_dump($dbconnect);
// die;

$ts = mysqli_query($dbconnect,"SELECT userid FROM register");
$row = mysqli_num_rows($ts);

var_dump($row);
die;


?>
<!DOCTYPE html>
<html>
  <head>
    <title>Secure Login | FHC-Internet Banking</title>
    <meta charset="utf-8">
    <meta content="ie=edge" http-equiv="x-ua-compatible">
    <meta content="template language" name="keywords">
    <meta content="Tamerlan Soziev" name="author">
    <meta content="Admin dashboard html template" name="description">
    <meta content="width=device-width, initial-scale=1" name="viewport">
    <link href="favicon.png" rel="shortcut icon">
    <link href="apple-touch-icon.png" rel="apple-touch-icon">
    <link href="https://fonts.googleapis.com/css?family=Rubik:300,400,500" rel="stylesheet" type="text/css">
    <link href="bower_components/select2/dist/css/select2.min.css" rel="stylesheet">
    <link href="bower_components/bootstrap-daterangepicker/daterangepicker.css" rel="stylesheet">
    <link href="bower_components/dropzone/dist/dropzone.css" rel="stylesheet">
    <link href="bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css" rel="stylesheet">
    <link href="bower_components/fullcalendar/dist/fullcalendar.min.css" rel="stylesheet">
    <link href="bower_components/perfect-scrollbar/css/perfect-scrollbar.min.css" rel="stylesheet">
    <link href="bower_components/slick-carousel/slick/slick.css" rel="stylesheet">
    <link href="css/main.css?version=4.4.0" rel="stylesheet">
  </head>

  <?php
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      if(isset($_POST['login'])){
        require 'php/server.php';
      }
    }
  ?>
  <body class="auth-wrapper">
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w">
        <div class="logo-w">
          <a href="index.html"><img alt="Fort Market Logo" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
          Client Login
        </h4>
        <form method="post" action="">
          <div class="form-group">
            <label for="">User ID</label><input class="form-control" placeholder="Enter your userid" type="text" name="userid">
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
          </div>
          <div class="form-group">
            <label for="">Password</label><input class="form-control" placeholder="Enter your password" type="password" name="password">
            <div class="pre-icon os-icon os-icon-fingerprint"></div>
          </div>
          <div class="buttons-w">
            <button class="btn btn-primary" name="login">Secure Login</button>
            <div class="form-check-inline">
              <label class="form-check-label"><input class="form-check-input" type="checkbox">Remember Me</label> 
            </div>
			      <p> New? <a href="auth_register.php"> Register </a></p>
          </div>

          <p id="err-class"> <?php 
                    if (isset($echo)) {
                        # code...
                        echo $echo;
                        echo  "<br>";
                    }
             ?></p>
        </form>
      </div>
    </div>
  </body>
</html>
