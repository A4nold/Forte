<?php

    $sesh = trim($_SESSION['userid']);
    $userindb = $dbconnect->query("SELECT * FROM register where userid = '$sesh'");
    $user = $userindb->fetch_assoc();
    $passindb = $user["password"];
    // $cpassindb = $user["confirmpassword"];

    $opass = $dbconnect -> real_escape_string($_POST["opass"]);
    $npass = $dbconnect -> real_escape_string($_POST["npass"]);
    $cpass = $dbconnect -> real_escape_string($_POST["cpass"]);


    if(password_verify($opass,$passindb)){
        //true
        if($npass == $cpass){
            $hashnpass =  password_hash($npass, PASSWORD_DEFAULT);
            $id = $user["id"];

            $update = "UPDATE `register` SET `password` = '$hashnpass', 
            `confirmpassword` = '$hashnpass' WHERE `id`='$id' ";

            $check = $dbconnect -> query($update);

            if ($check === TRUE) {
                # code...
                $echo = "Password Changed";
            }else{
                $echo = "Password Update Fail". $dbconnect->error;
            }
            
        }else{
            $echo = "New Password Confirm Password Match Fail";
        }
    }
    else{
        $echo = "Old Password Does Not Match Db";
    }

?>