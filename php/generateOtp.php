<?php
$dbconnect = mysql_connect('localhost', 'forteho1_forteho1', 'VC2uFi27a4)a*T', 'forteho1_registration') or die("Failed to connect !!!, contact admin");
session_start();

header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

$user = $_SESSION['user_id'];
$role = $_SESSION['role'];
$email =$_SESSION['e_mail'];

//$result = $dbconnect->query("SELECT * FROM transactionhistory where userid = '$user'");

if(strlen($user) < 1){
    echo json_encode("no user logge in");
}else{
    if(strlen($role) > 1){
        $otp1 = mt_rand(0,9);
        $otp2 = mt_rand(0,9);
        $otp3 = mt_rand(0,9);
        $otp4 = mt_rand(0,9);
        $otp5 = mt_rand(0,9);

        $otp = $otp1.$otp2.$otp3.$otp4.$otp5;

        $add = "insert into generateotp (userid,otp) values ('$user','$otp')";

        $check = mysqli_query($dbconnect, $add);
        
        if ($check) {
            $to = $email;
            $subject = "OTP Verification for $user"; 
            $message = "<p>Your OTP is $otp</p>";
            $headers = "From:FHC-ONLINE\r\n";
            $headers .= "MIME-Version: 1.0" . "\r\n";
            $headers .= "Content-type:text/html;charset=UTF-8" . "\r\n";
  
            mail($to,$subject,$message,$headers);
              
            // header('location:emails_activate.php');
            echo json_encode($otp." sent to your email");
        }else{
            $otp = "Generation fail";
            echo json_encode($otp);
        }

    }else{
        echo json_encode("no role here");
    }
}


http_response_code(200);


?>