<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Forte Capital Consulting - Corporate Finance, Investment & Startup Loans">
	<meta name="author" content="Ixraellee">
	<title>Forte Capital Consulting - Corporate Finance, Investment & Startup Loans</title>

    <!-- Favicons-->
    <link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
    <link rel="apple-touch-icon" type="image/x-icon" href="img/apple-touch-icon-57x57-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="72x72" href="img/apple-touch-icon-72x72-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="114x114" href="img/apple-touch-icon-114x114-precomposed.png">
    <link rel="apple-touch-icon" type="image/x-icon" sizes="144x144" href="img/apple-touch-icon-144x144-precomposed.png">

    <!-- BASE CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link href="css/style.css" rel="stylesheet">
	<link href="css/menu.css" rel="stylesheet">
	<link href="css/responsive.css" rel="stylesheet">
	<link href="css/elegant_font/elegant_font.min.css" rel="stylesheet">
	<link href="css/fontello/css/fontello.min.css" rel="stylesheet">

    <!--[if lt IE 9]>
      <script src="js/html5shiv.min.js"></script>
      <script src="js/respond.min.js"></script>
    <![endif]-->
    
	<script type="text/javascript">
    function delayedRedirect(){
        window.location = "index.html"
    }
    </script>

</head>
<body id="confirmation" onLoad="setTimeout('delayedRedirect()', 10000)">
<?php
						$mail = $_POST['email_quote'];

						/*$subject = "".$_POST['subject'];*/
						$to = "appointment@fortecapitalconsulting.com";
						$subject = "Application to Prequalify";
						$headers = "From: Forte Capital Consulting <noreply@fortecapitalconsulting.com>";
						
						$message = "\nPERSONAL INFO"; 
						$message .= "\nName: " . $_POST['firstname_quote'];
						$message .= "\nLast Name: " . $_POST['lastname_quote'];
						$message .= "\nEmail: " . $_POST['email_quote'];
						$message .= "\nPhone number: " . $_POST['phone_quote'];
						
						$message .= "\n\nADDRESS"; 
						$message .= "\nLine1: " . $_POST['city_quote'];
						$message .= "\nLine2: " . $_POST['street_quote'];
						$message .= "\nState: " . $_POST['state_quote'];
						$message .= "\nPostal code: " . $_POST['postal_code_quote'];
						$message .= "\nCountry: " . $_POST['country_quote'];
						$message .= "\n\nPREFERRED DATE";
						$message .= "\nDate: " . $_POST['date_quote'];
						$message .= "\nTime: " . $_POST['time_quote'];
						
						$message .= "\n\nADDTIONAL INFO"; 
						$message .= "\nAre you a new client? " . $_POST['option_1'];
						$message .= "\nDo you have an insurance? " . $_POST['option_2'];
						$message .= "\nInvestment Management? " . $_POST['option_3'];
						$message .= "\nLoan? " . $_POST['option_4'];
						$message .= "\nFinancial Advisory? " . $_POST['option_5'];
						$message  .= "\n\nADDITIONAL NOTES"; 
						$message .= "\nPrimary Concern: " . $_POST['message_quote'];
						
						//Receive Variable
						$sentOk = mail($to,$subject,$message,$headers);
						
						//Confirmation page
						$user = "$mail";
						$usersubject = "Thank You";
						$userheaders = "From: info@fortecapitalconsulting.com\n";
						/*$usermessage = "Thank you for your time. Your request is successfully submitted.\n"; WITH OUT SUMMARY*/
						//Confirmation page WITH  SUMMARY
						$usermessage = "Thank you for your time. Your request is successfully submitted.\n\nSUMMARY\n$message"; 
						mail($user,$usersubject,$usermessage,$userheaders);
	
?>

<!-- END SEND MAIL SCRIPT -->   
<div id="success">
	<div class="icon icon--order-success svg">
		<svg xmlns="http://www.w3.org/2000/svg" width="72px" height="72px">
                <g fill="none" stroke="#8EC343" stroke-width="2">
                  <circle cx="36" cy="36" r="35" style="stroke-dasharray:240px, 240px; stroke-dashoffset: 480px;"></circle>
                  <path d="M17.417,37.778l9.93,9.909l25.444-25.393" style="stroke-dasharray:50px, 50px; stroke-dashoffset: 0px;"></path>
                </g>
              </svg>
	</div>
	<h4><span>Thank you!</span>Prequalification request sent.</h4>
	<small>You will be redirect back in 5 seconds.</small>
</div>
</body>
</html>