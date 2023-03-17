<?
    include "db.php"; 
    include "main.php";
    //include "inventory.php";
?>

<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-latest.min.js"></script> 

    <?php
        session_start();
        if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
        else $userid = "";    
    ?> 
</head>

<body>
    <style>
            table { margin : auto;}
    </style>
    <br>
    <hr class="head"> <br>

    <!-- 약국입력 테이블 -->
    <table border=1 width=600 margin="600" style="border-collapse : collapse; border : 1px solid black;">
        <tr>        
            <td> 약국이름 </td>
            <td> 검색 </td>       
        </tr>
        <tr>
            <form action="" method="GET">
                <div class="input-group mb-3">
                    <td>
                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" placeholder="약국 이름을 입력하세요" style="width:450px;">
                    </td>
                    <td>   
                        <button type="submit" class="btn btn-primary"style="width:130px;">Search</button>
                    </td>
                </div>
            </form>
        </tr>
    </table>
    <br>

    <!-- 수량변경 테이블 -->
    <table border=0 width=600 margin="600" style=" text-align: right;">
        <tr>
            <td>
                <button  class="w-btn w-btn-indigo" onclick="window.open('modifiy_form.php','window_name','width=280,height=300,location=no,status=no,scrollbars=yes');" style="width:90px; height:30px; border:1px;">수량변경</button> 
            </td>
        </tr>
    </table>

    <!-- 값이뜨는 테이블 -->
    <table border=1 width=600 margin="600" style="border-collapse : collapse; border : 1px solid black;">
                <tr>
                    <th>주소</th>
                    <th>약국이름</th>
                    <th>약이름</th>
                    <th>설명</th>
                    <th>수량</th>
                </tr>
            </thead>
            <tbody>
            <?php 
                $con = mysqli_connect("localhost","yujin","1294","medicine");

                if(isset($_GET['search']))
                {
                    $filtervalues = $_GET['search'];
                    $query = "SELECT * FROM k_medicine WHERE CONCAT(m_medicine) LIKE '%$filtervalues%'
                    INTERSECT
                    SELECT * FROM k_medicine WHERE CONCAT(id) Like '%$userid%' ;
                    ";

                    $query_run = mysqli_query($con, $query);

                    if(mysqli_num_rows($query_run) > 0)
                    {
                        foreach($query_run as $items)
                        {
                            ?>
                            <tr>                           
                                <td><?= $items['sido']; ?>
                                    <?= $items['gugun']; ?> <?= $items['dong']; ?></td>
                                    <td><?= $items['m_medicine']; ?></td>
                                    <td><?= $items['m_name']; ?></td>
                                    <td><?= $items['m_explain']; ?></td>
                                    <td><?= $items['m_count']; ?></td>
                                </tr>
                            <?php
                            // $uerid = $_POST["id"];
                            // $filtervalues =$_POST["m_medicine"];
                        } 
                    }
                    else
                    {
                    ?>
                        <tr>
                            <td colspan="4"> 찾을 수 없습니다.</td>
                        </tr>
                    <?php
                    }
                }       
                ?>                
                <div>
                    <?php
                        session_start();
                        $_SESSION["filtervalues"] = $filtervalues;
                        $_SESSION["userid"] = $userid;
                    ?>
                </div>
            </tbody>
        </table>
    <br>                           
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
   

   
<footer>
    <?php include "footer.php";?>
</footer>
    
</html>
<style>
    .w-btn-indigo {
        background-color: aliceblue;
        color: #1e6b7b;
        border: none;
        height: 100;
      
 
    }    
    .head {
  width : 90%;
  height : 1px;
  background-color : pink; 
}                             
</style>