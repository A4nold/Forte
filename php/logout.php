<?php 
	session_start();

	if (session_destroy()) {
        # code...
        session_unset();
        session_destroy();
		header("Location: ../index.html");
	}
 ?>