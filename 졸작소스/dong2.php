

<?
    include "db.php"; 
    //include "inventory.php";
?>
<!DOCTYPE html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="//code.jquery.com/jquery-latest.min.js"></script> 

    <script>
         function getGugun(a){
           $.get("getGugun.php?sido="+a,function(data){
                $("#areaGugun").html(data); 
                // $("#areaDong").html(""); 
                // $("#areaall").html(""); 
               

           }); 
         };

         function getDong(a){
           $.get("getDong.php?gugun="+a,function(data){
                $("#areaDong").html(data);
                // $("#areaall").html("");
                


           }); 

         };
         function all_s(a){
           $.get("all.php?dong="+a ,function(data){
                $("#areaall").html(data);
                
             

           }); 

         };
        

         
         
      
    </script>
</head>
<body>
<style>
            table { 
                      margin : auto;}
      </style>
      <!-- 검색하는 테이블  -->
<table border=1 width=1000 margin="600" style="border-collapse : collapse; border : 1px solid black;">
        <tr>
            <td style="width : 200px;"> 시도 </td>
            <td style="width : 200px;"> 구군 </td>
            <td style="width : 200px;"> 동 </td>
            <td style="width : 500px;"> 전체 </td>
            <td style="width : 150px;"> 검색 </td>

            
        </tr>

        <tr>
            <td style="width : 200px;">    
            <select name="sido" id="sido" onchange="getGugun(this.value);" style="width : 170px;">
                <option value="">시도를 선택하세요. </option> 
                <?
                    $db -> groupBy("sido");
                    $list = $db->get("dong"); 

                    foreach($list as $data){
                    ?>
                    <option value="<?=$data['sido']?>"><?=$data['sido']?></option>
                    <? 
                    
                    };
                ?>
            </select> 
            

            </td>
            <td style="width : 200px;"><div id="areaGugun"></div></td>
            <td style="width : 200px;"><div id="areaDong"></div></td>
            <td style="width : 500px;"><div id="areaall"></div></td>


            <td><button type="submit" class="btn btn-primary" onClick="location.href='inventory.php'" style="width:180px;">Search</button></td>
                </tr>
        </table>
                <br>

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
            <?php
            $con = mysqli_connect("localhost","yujin","1294","medicine");
            // $query = " SELECT * FROM k_medicine WHERE (k_medicine.sido,k_medicine.gugun,k_medicine.dong) 
            // IN (SELECT * FROM dong WHERE CONCAT('$sido','$gugun','$dong') LIKE CONCAT(dong.sido,dong.gugun,dong.dong));
            // ";
            $query = "SELECT * FROM k_medicine WHERE CONCAT(k_medicine.sido,k_medicine.gugun,k_medicine.dong) 
            IN (SELECT CONCAT(sido, gugun, dong)  FROM dong WHERE '$sido' = sido and '$gugun' = gugun and '$dong'= dong);
            ";
            $query_run = mysqli_query($con, $query);
            
            if(mysqli_num_rows($query_run) > 0)
                    {
                        ?>
                        <!-- 검색결과 print를 위한 테이블 수평 맞추기위해  -->
                        <table border=0 width=1000 margin="600" style="border-collapse : collapse; border : 0px solid black;">
                            <tr style="border:None;">
                                <td>검색 결과 : <?=$full_name?></td>
                            </tr>
                        </talbe>
                        <br>
                        <!-- 검색결과 뜨는 테이블 시작 -->
                        <table border=1 width=1000 margin="600" style="border-collapse : collapse; border : 1px solid black;">
                            <tr>
                                <td> 주소 </td>
                                <td> 약국명 </td>
                                <td> 약 이름 </td>
                                <td> 약 설명 </td>
                                <td> 수량 </td>
                            </tr>
                        <?php
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
                    </table>
                    <!-- 검색결과 없을떄 테이블  -->
                    <table border=1 width=1000 margin="600" style="border-collapse : collapse; border : 1px solid black;">
                        <tr>
                            <td> 주소 </td>
                            <td> 약국명 </td>
                            <td> 약 이름 </td>
                            <td> 약 설명 </td>
                            <td> 수량 </td>
                        </tr>
                        <tr>
                            <td colspan="5">검색 결과가 없습니다.</td>
                        </tr>
                    </table>    
                    <br>
                            
                        
                    <?php
                    } 

                $_SESSION["sido"] = "";
                $_SESSION["gugun"]  = "";
                $_SESSION["dong"]  = "";
                $_SESSION["full_name"]  = "";
           
            ?>
          

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>


           
            

            

                    
                       



   
    
</body>
</html>