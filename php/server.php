<?php

		$userid = mysqli_real_escape_string($dbconnect, $_POST["userid"]);
		$result = $dbconnect->query("SELECT * FROM register where userid = '$userid'");
		// $num_rows = mysqli_num_rows($result);
		// echo $result -> num_rows;
		//die();

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
				
				$hash =$passindb;
				
				if(password_verify($password,$passindb)){
					$_SESSION['userid'] = $_POST["userid"];
					$_SESSION['password'] = $_POST["password"];
					$_SESSION['active'] = $user['active'];

					//check user login
					$_SESSION['isloggedin'] = true;
					header("location:apps_bank.php");
				}else{
					$echo = "Incorrect username or password";
				}
			}
	
			
		}
?>