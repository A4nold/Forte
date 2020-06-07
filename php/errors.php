<?php
    session_start();
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>

        <?php
            if(isset($_SESSION['message']) && !empty($_SESSION['message'])){
                echo $_SESSION['message'];
            }else{
                header("location: ../index.html");
            }
        ?>

    </p>
</body>
</html>