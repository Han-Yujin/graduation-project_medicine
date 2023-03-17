<?php
   include "db.php";
   session_start();
   if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
   else $userid = "";
   if (isset($_SESSION["filtervalues"])) $filtervalues = $_SESSION["filtervalues"];
   else $userid = "";     


    $m_medicine = $_POST['m_medicine']; //약국이름
    $m_name = $_POST['m_name']; // 약이름
    $m_count =$_POST['m_count']; //수량
          
    $con = mysqli_connect("localhost", "yujin", "1294", "medicine");
    $sql = "UPDATE k_medicine set m_count='$m_count' ";
    $sql .= "where m_name = '$m_name' AND m_medicine= '$filtervalues' AND id= '$userid' ";
    // mysqli_query($con, $sql);

    if (mysqli_query($con, $sql)) {
        echo "<script>window.close();</script>";
    } else {

        echo "레코드 수정 실패! : ".mysqli_error($con);

    }

    mysqli_close($con);

?>