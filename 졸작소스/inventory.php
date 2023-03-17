<?php
            session_start();
            if (isset($_SESSION["sido"])) $sido = $_SESSION["sido"];
            else $sido = ""; 
            if (isset($_SESSION["gugun"])) $gugun = $_SESSION["gugun"];
            else $gugun = "";   
            if (isset($_SESSION["dong"])) $dong = $_SESSION["dong"];
            else $dong = "";  
            if (isset($_SESSION["full_name"])) $full_name = $_SESSION["full_name"];
            else $full_name = "";
            
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <link rel="stylesheet" href="main.css">
    <title>medicine inventory</title>
  </head>
  <body>
    <body> 
      <style>
        body{min-width:950px; text-align:center;}
       
       .head {
        width : 90%;
        height : 1px;
        background-color : pink; 
  
        </style>
       
        <aTag_PageOpen>
           
            <?php
            include "main.php"
            ?>
            <div> 
              <br>
              <hr class="head"><br>


            <?php

               include "dong2.php";
            ?>
  </body>
  <footer>
    <?php
      // include "footer.php";
    ?>
  </footer>
 

</html>