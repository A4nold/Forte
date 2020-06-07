<?php

$userid = $_SESSION['user_id'];

$amt = $_POST['amt'];
$type = $_POST['type'];
$details = $_POST['details'];


$result = $dbconnect->query("SELECT * FROM transactionhistory where userid = '$userid' AND id = (SELECT max(id) from transactionhistory) ");
// echo $amt.$type.$details;
//var_dump($result);
// die;

if($result -> num_rows == 0){
    //check if user exist
    $echo = "User is missing from record";
}else{
    //user exist

    $user = $result->fetch_assoc();
    
    $id = $user['id'];
    $amt = $dbconnect -> real_escape_string($amt);
    $type = $dbconnect -> real_escape_string($type);
    $details = $dbconnect -> real_escape_string($details);

    $update = "UPDATE `transactionhistory` SET `amount` = '$amt', `details` = '$details',
    `type` = '$type' WHERE `id`='$id' ";

    $check = $dbconnect -> query($update);
    if ($check === TRUE) {
        # code...
        $echo = "Transaction History Done";
    }else{
        $echo = "Transaction History".$dbconnect->error;
    }


}

?>