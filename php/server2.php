<?php 

$role = $_POST["role"];
$userid = mysqli_real_escape_string($dbconnect, $_POST["userid"]);
$result = $dbconnect->query("SELECT * FROM dashboard where userid = '$userid'");



if (strlen($userid) < 5) {
    # code...
    $echo = "Your userid must be atleast 5";
}
else{
    if($result -> num_rows == 0){
        //check if user exist
        $echo = "User is missing from record";
    }
    else{
        //user exist
        $user = $result->fetch_assoc();
        $password = mysqli_real_escape_string($dbconnect, $_POST["password"]);
        
        $passindb = trim($user['password']);
        $email = trim($user['email']);
        
        $roleindb = trim($user['role']);
        $role = $dbconnect -> real_escape_string($role);

        if($roleindb !== $role){

            $echo = "Incorrect Login Details";
        }

        if(password_verify($password,$passindb)){
            $_SESSION['user_id'] = $_POST["userid"];
            $_SESSION['e_mail'] = $email;
            $_SESSION['role'] = $_POST["role"];

            if($role == "admin"){
                $_SESSION['isloggedin'] = true;
                $_SESSION['role'] = $_POST["role"];
                
                header("location:apps_bank3.php");
            }elseif ($role == "user") {
               //check user login
                $_SESSION['isloggedin'] = true;
                $_SESSION['role'] = $_POST["role"];
            
                header("location:apps_bank2.php");
            }

            
           
        }else{
            $echo = "Incorrect username or password";
        }
    }

    
}

?>