<?php 
$dbconnect = mysqli_connect("localhost", "root", "", "registration") or die("Couldnt establish database connection !!!");
session_start();
$user = $_SESSION['userid'];
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
      if(isset($_POST['transfer'])){
        require 'php/performtransfer.php';
      }
    }
  ?>
  <body class="auth-wrapper">
  <div class="content-box">
    <div class='row'>
      <div class='col-lg-6'>
        <div class='element-wrapper'>
          <h6 class='element-header'>
            Transfers
          </h6>
          <div class='element-box'>
            <form action="" method="post" enctype="multipart/form-data">
              <h5 class='form-header'>
                Local Transfer
              </h5>
              <div class='form-desc'>
                Send money
              </div>
              <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Bank Name</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter bank name' type='text' name='bname'>
                </div>
              </div>
              
              <fieldset class='form-group'>
                <div class='form-group row'>
                  <label class='col-sm-4 col-form-label'>Bank Address</label>
                  <div class='col-sm-8'>
                    <textarea class='form-control' rows='3' name='address'></textarea>
                  </div>
                </div>
              </fieldset>

              <fieldset class='form-group'>
                <div class='form-group row'>
                  <label class='col-sm-4 col-form-label'>Transaction Details</label>
                  <div class='col-sm-8'>
                    <textarea class='form-control' rows='3' name='details'></textarea>
                  </div>
                </div>
              </fieldset>

              <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Country</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter Country' type='text' name='country'>
                </div>
              </div>

              <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Account Name</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter account name' type='text' name='accname'>
                </div>
              </div>

              <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Account Number</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter account number' type='number' name='accnum'>
                </div>
              </div>

              <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Short Code/Routing Number</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter Short Code/Routing Number' type='number' name='snum'>
                </div>
              </div>

              <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Amount</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter amount' type='text' name='amt'>
                </div>
              </div>

              

              <!-- <div class='form-group row'>
                <label class='col-form-label col-sm-4' for=''> Otp</label>
                <div class='col-sm-8'>
                  <input class='form-control' placeholder='Enter amount' type='number' name='otp'>
                </div>
              </div> -->
              
              <div class='form-buttons-w'>
                <button class='btn btn-primary' type='transfer' name="transfer" > Submit</button>
              </div>
              

              <p id='err-class'> <?php 
                      if (isset($echo)) {
                          # code...
                          echo $echo;
                      }
              ?></p>

            </form>

            <!-- <button class='btn btn-primary' id="generate" type='transfer'> Generate OTP</button> -->

          </div>
        </div>
        
      </div>

      <div class="col-lg-6">
        <div class="element-wrapper">

        </div>
      </div>
    </div>
  </div>
  </body>
</html>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"> 
    </script>
    <script src="bower_components/bootstrap/dist/js/bootstrap.min.js">
    </script>

<script>
   
     
// $(document).ready(function(){
//     $("#generate").click(function(){
//         $.get("http://localhost:8012/forte/php/generateOtp.php", function(data){
//             // Display the returned data in browser
//             $("#result").html(data);
//         });
//     });
// });


// </script>