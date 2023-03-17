<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <?php
        session_start();
        $_SESSION["board_value"] = 3;
        if (isset($_SESSION["subject"])) $num = $_SESSION["subject"];
        else $num = "";    
        if (isset($_SESSION["page"])) $page = $_SESSION["page"];
        else $page = "";   
        if (isset($_SESSION["id"])) $userid = $_SESSION["id"];
        else $userid = "";   

        $_SESSION["subject"] = $subject;
		$_SESSION["page"] = $page;
		$_SESSION["id"] = $userid;



        ?>
        

</head>
<body>
<?php
      echo("<script>location.replace('login_form.php');</script>");
?>
</body>
</html>
    