<?php

    $user = $_SESSION['userid'];
    $bname = $_POST['bname'];
    $address = $_POST['address'];
    $country = $_POST['country'];
    $accname = $_POST['accname'];
    $accnum = $_POST['accnum'];
    $snum = $_POST['snum'];
    $amt = $_POST['amt'];
    $details = $_POST['details'];

    $_SESSION['bname'] = $_POST['bname'];
    $_SESSION['address'] = $_POST['address'];
    $_SESSION['country'] = $_POST['country'];
    $_SESSION['accname'] = $_POST['accname'];
    $_SESSION['accnum'] = $_POST['accnum'];
    $_SESSION['snum'] = $_POST['snum'];
    $_SESSION['amt'] = $_POST['amt'];
    $_SESSION['details'] = $_POST['details'];

    header("location: apps_bank_otp.php");

    // $otp1 = mt_rand(0,100);
    // $otp2 = mt_rand(0,100);
    // // $otp = $_POST['otp'];
    // $details = $_POST['details'];

    // $result = $dbconnect->query("SELECT * FROM generateotp where userid = '$user' AND id
    //  = (SELECT max(id) from generateotp)");

    //     // if($result -> num_rows == 0){
    //     //     //check if otp exist
    //     //     $echo = "Otp is missing from record";
    //     // }else{
    //     //     $otpfind = $result->fetch_assoc();
    //     //     $otpindb = $otpfind["otp"];
    //     //     $otp = $dbconnect -> real_escape_string($otp);
            

    //     //     if($otp === $otpindb){

    //             $bname = $dbconnect -> real_escape_string($bname);
    //             $address = $dbconnect -> real_escape_string($address);
    //             $country = $dbconnect -> real_escape_string($country);
    //             $accname = $dbconnect -> real_escape_string($accname);
    //             $accnum = $dbconnect -> real_escape_string($accnum);
    //             $snum = $dbconnect -> real_escape_string($snum);
    //             $amt = $dbconnect -> real_escape_string($amt);
    //             $details = $dbconnect -> real_escape_string($details);
    //             $uniquenumber = $otp1.$otp2;
    //             $timestamp = date('Y-m-d H:i:s');


    //             $add = "insert into transactionhistory ( userid,bankname,bankaddress,country,accountname,
    //             accountnumber,shortcode,amount, date,details,uniquenumber) values 
    //             ('$user','$bname','$address','$country','$accname','$accnum',
    //             '$snum','$amt','$timestamp','$details','$uniquenumber')";

    //             $check = mysqli_query($dbconnect, $add);

    //             if($check){
    //                 $echo = "Transfer Successful";
    //             }else{
    //                 $echo = "Transfer Failed";
    //             }

        //     }else{
        //         $echo = "Invalid Otp";
        //     }
        // }
    
?>