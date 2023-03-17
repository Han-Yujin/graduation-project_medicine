<?php
    
    session_start();
    if (isset($_SESSION["num"])) $num = $_SESSION["num"];
    else $num = "";    
    if (isset($_SESSION["page"])) $page = $_SESSION["page"];
    else $page = "";   
    if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
    else $page = "";


    $subject = $_POST["subject"];
    $content = $_POST["content"];
          
    $con = mysqli_connect("localhost", "yujin", "1294", "medicine");
    $sql = "update board set subject='$subject', content='$content' ";
    $sql .= " where num=$num";
    mysqli_query($con, $sql);

    mysqli_close($con);     

    echo "
	      <script>
	          location.href = 'board_list.php?page=$page';
	      </script>
	  ";
?>

   
