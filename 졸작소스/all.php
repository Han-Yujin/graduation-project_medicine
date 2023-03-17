<?
    include "db.php"; 

    $dong = $_GET['dong'];


    session_start();
    if (isset($_SESSION["sido"])) $sido = $_SESSION["sido"];
    else $sido = "";   
    if (isset($_SESSION["gugun"])) $gugun = $_SESSION["gugun"];
    else $gugun = "";
    
    $_SESSION["gugun"] = $gugun;
    $_SESSION["sido"] = $sido;  
    $_SESSION["dong"] = $dong;    
    $_SESSION["full_name"] = $gugun.$sido.$dong;
    
    echo ($gugun);
    echo ($sido);
    echo ($dong);

?>
