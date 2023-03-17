

<?
    include "db.php"; 
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
                $("#areaDong").html(""); 
                $("#areaname").html(""); 

                

           }); 
         }

         function getDong(a){
           $.get("getDong.php?gugun="+a,function(data){
                $("#areaDong").html(data); 
                $("#addr").val("");   
           }); 

         }
      
    </script>
</head>
<body>
<style>
            table { 
                      margin : auto;}
      </style>
<table border=1 width=600 margin="600">
        <tr>
            <td> 시도 </td>
            <td> 구군 </td>
            <td> 동 </td>
            <td> 약국이름 </td> 
            <td>약이름</td>
            <td> 검색 </td>
            
        </tr>

        <tr>
            <td>    
            <select name="sido" id="sido" onchange="getGugun(this.value);" >
                <option value="">시도를 선택하세요. </option> 
                <?
                    $db -> groupBy("sido");
                    $list = $db->get("dong"); 

                    foreach($list as $data){
                    ?>
                    <option value="<?=$data['sido']?>"><?=$data['sido']?></option> 
                    <? 
                    
                    }
                ?>
            </select> 

            </td>
            <td><div id="areaGugun"></div></td>
            <td><div id="areaDong"></div></td>
            <td>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-header">
                    </div>
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-7">

                                <form action="" method="GET">
                                    <div class="input-group mb-3">
                                        <input type="text" name="search" required value="<?php if(isset($_GET['search'])){echo $_GET['search']; } ?>" class="form-control" placeholder="Search data"></td>
                                  <td>      <input type="text" name="search2" required value="<?php if(isset($_GET['search2'])){echo $_GET['search2']; } ?>" class="form-control" placeholder="Search data">

                                    <td>    <button type="submit" class="btn btn-primary">Search</button></td>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
                </td>
            <div class="col-md-12">
                <div class="card mt-4">
                    <div class="card-body">
                        <table border=1 width=600 margin="1000"> <br>
                            <thead>
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
                                        $filtervalues_2= $_GET['search2'];
                                       // $filtervalues_3= $_GET['dong'];



                                        $query = "SELECT * FROM k_medicine WHERE CONCAT(m_medicine) LIKE '%$filtervalues%'
                                         INTERSECT 
                                         SELECT * FROM k_medicine WHERE CONCAT(m_name) LIKE '%$filtervalues_2%' ;
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
                                            }
                                        }
                            
                                        else
                                        {
                                            ?>
                                                <tr>
                                                    <td colspan="4">No Record Found</td>
                                                </tr>
                                            <?php
                                        }
                                    }
                                ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js"></script>
</body>
</body>
</html>