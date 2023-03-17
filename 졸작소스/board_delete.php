
<?php
session_start();
if (isset($_SESSION["num"])) $num = $_SESSION["num"];
else $num = "";    
if (isset($_SESSION["page"])) $page = $_SESSION["page"];
else $page = "";   
if (isset($_SESSION["id"])) $userid = $_SESSION["id"];
else $userid = "";   


    
    $con = mysqli_connect("localhost", "yujin", "1294", "medicine");
    $sql = "select * from board where num = $num";
    $result = mysqli_query($con, $sql);
    $row = mysqli_fetch_array($result);

    $copied_name = $row["file_copied"];

	if ($copied_name)
	{
		$file_path = "./data/".$copied_name;
		unlink($file_path);
    }
    
    $sql = "delete from board where num = $num ";
    mysqli_query($con, $sql);
    mysqli_close($con);

    echo "
	     <script>
	         location.href = 'board_list.php?page=$page';
	     </script>
	   ";
?>

