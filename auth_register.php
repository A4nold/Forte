<?php
$dbconnect = mysql_connect('localhost', 'forteho1_forteho1', 'VC2uFi27a4)a*T', 'forteho1_registration') or die("Failed to connect !!!, contact admin");
session_start();
?>
<!DOCTYPE html>
<html>
  <head>
    <title>Merchant Registration| FHC-Internet Banking</title>
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
    <link href="bower_components/bootstrap/dist/css/bootstrap.min.css/" rel="stylesheet">
    
    <link href="css/main.css?version=4.4.0" rel="stylesheet">
 
  </head>
  <?php 
  $error = null;

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

    if(isset($_POST['register'])){

      $_SESSION['userid'] = $_POST['userid'];
      $_SESSION['email'] = $_POST['email'];

      $uname = $_POST['userid'];
      $email = $_POST['email'];
      $fname = $_POST['firstname'];
      $lname = $_POST['lastname'];
      $pic = $_FILES['picture']['name'];
      $path = 'img/';
                $tmp = $_FILES['picture']['tmp_name'];
                $location = $path.$pic;
                move_uploaded_file($tmp, $location);
      //$pic = addslashes(file_get_contents($_FILES['picture']['name']));
      $pass = rand(0,100).$uname;
      $hashpass = password_hash($pass, PASSWORD_DEFAULT);

      $userCheck = $dbconnect->query("SELECT * FROM register where userid = '$uname'");
      $emailCheck = $dbconnect->query("SELECT * FROM register where email = '$email'");
  
      if (strlen($uname) < 5) {
        # code...
        $error = "Your username must be atleast 5";
      }
      else if (empty($fname)) {
        # code...
        $error = "First Name field cannot be empty";
      }
      else if (empty($lname)) {
        # code...
        $error = "Last Name field cannot be empty";
      }
      else{

        if($userCheck -> num_rows > 0){
          //check if user exist
          $_SESSION['message'] = "User with id exist, please pick another";
          header("location: php/errors.php");
        }
        else if($emailCheck -> num_rows > 0){
          //check if user exist
          $_SESSION['message'] = "Email already exist, please pick another";
          header("location: php/errors.php");
        }

        else{
          $uname = $dbconnect -> real_escape_string($uname);
          $email = $dbconnect -> real_escape_string($email);
          $fname = $dbconnect -> real_escape_string($fname);
          $lname = $dbconnect -> real_escape_string($lname);
      
          $add = "insert into register ( userid,email,firstname,lastname,password,confirmpassword,picture) values 
              ('$uname','$email','$fname','$lname','$hashpass','$hashpass','$pic')";
          
          $check = mysqli_query($dbconnect, $add);
    
          if ($check) {
            // Send verification mail
            $to = $email;
            $subject = "Email Verification for $uname"; 
            $message = "<p>Your password is $pass</p>";
            $headers = "From:arnoldekechi1998@gmail.com\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
            mail($to,$subject,$message,$headers);  
            header('location:emails_activate.php');
          }		
          else{
            $_SESSION['message'] = "Registration failed";
            header("location:php/errors.php");
          }	
        }
          
        }
    }

		
	}

?>
  <body>
    <div class="all-wrapper menu-side with-pattern">
      <div class="auth-box-w wider">
        <div class="logo-w">
          <a href="index.html"><img alt="" src="img/logo-big.png"></a>
        </div>
        <h4 class="auth-header">
          Merchant Registration
        </h4>
        <form name="form1 "class= "form-control form-signin" action="" method="post" enctype="multipart/form-data" >
		<!-- Display validation errors-->
		<div class="form-group">
            <label for=""> User ID</label><input class="form-control" placeholder="Enter User ID" id="userid" name="userid" type="text"value="" required>
            <div class="pre-icon os-icon os-icon-user-male-circle"></div>
            
          </div>
          <div class="form-group">
            <label for=""> Email address</label><input class="form-control" placeholder="Enter email" id="email" name="email" type="email" value="" required>
            <div class="pre-icon os-icon os-icon-email-2-at2"></div>
          </div>
          <div class="form-group">
            <label for=""> Profile Picture</label><input class="form-control" name="picture" data-error="Your picture is required" placeholder="Profile Picture" required="required" type="file">
            <div class="help-block form-text with-errors form-control-feedback"></div>
          </div>		 
          <div class="row">
            <div class="col-sm-6">
              <div class="form-group">
                <label for=""> First Name</label><input class="form-control" placeholder="Enter First Name" name="firstname" id="password" type="text" id="inputpassword" required>
                <div class="pre-icon os-icon os-icon-fingerprint"></div>
              </div>
            </div>
            <div class="col-sm-6">
              <div class="form-group"> 
              <label for=""> Last Name</label><input class="form-control" placeholder="Enter Last Name" name="lastname" id="cpassword" type="text" id="confirmpassword" required>
            </div>
            </div>
          </div>
          <div class="buttons-w">
            <button class="btn btn-primary" name="register">Register Now</button> 
          <p> Member?  <a href="auth_login.php"> Log in </a></p>
      
          <p id="err-class"><?php echo $error?></p>
          </div>
        </form>
      </div>
    </div>
  </body>

  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
    </script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>

</html>
