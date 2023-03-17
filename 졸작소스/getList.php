<?php
 
  header("Content-type: application/json");
  include "db.php";
  
  $limit = 1000;
  foreach ($_GET as $key => $value) {
     
    $a = $value['name']; // 
    $$a = $value['value'];
  }

  

  $db -> where("m_medicine","$searchText%","like"); 

  $list =$db->get("k_medicine", $limit);
?>
{
  "result": true,
  "data": {
    "contents": <?=json_encode($list)?>
   
  }
}





                     

                  
