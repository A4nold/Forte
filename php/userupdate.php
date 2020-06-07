<?php
    $userid = mysqli_real_escape_string($dbconnect, $_POST["userid"]);
    $email = $_POST["email"];
    $sesh = trim($_SESSION["userid"]);

    

    $result = $dbconnect->query("SELECT * FROM register where userid = '$sesh'");
    $userCheck = $dbconnect->query("SELECT * FROM register where userid = '$userid'");
    $emailCheck = $dbconnect->query("SELECT * FROM register where email = '$email'");


    if (strlen($userid) < 5) {
        # code...
        $echo = "Your username must be atleast 5";
    }
    else{
        if($userCheck -> num_rows > 0){
            //check if user exist
            $echo = "User exist, please pick another";
            // header("location: php/errors.php");
        }
        else if($emailCheck -> num_rows > 0){
            //check if user exist
            $echo = "Email exist, please pick another";
        }
        else{
            //user exist
            $user = $result->fetch_assoc();
            $id = $user["id"];

        
            $firstname = mysqli_real_escape_string($dbconnect, $_POST["firstname"]);
            $lastname = mysqli_real_escape_string($dbconnect, $_POST["lastname"]);
            $email = mysqli_real_escape_string($dbconnect, $_POST["email"]);
            $pic = $_FILES['picture']['name'];
            $path = 'img/';
                $tmp = $_FILES['picture']['tmp_name'];
                $location = $path.$pic;
                move_uploaded_file($tmp, $location);

            $update = "UPDATE `register` SET `userId` = '$userid', `email` = '$email',
            `firstname` = '$firstname', `lastname` = '$lastname ',picture = '$pic' WHERE `id`='$id' ";

            $check = $dbconnect -> query($update);
            
            if ($check === TRUE) {
                # code...
                $echo = "<script>alert('Successfully Updated!!!'); window.location='auth_login.php'</script>";
                session_destroy();
            }else{
                $echo = "Record Update Fail". $dbconnect->error;
            }
        }
    }

?>