
<?
    include "db.php"; 
    $sido = $_GET['sido']; 
    session_start();
    $_SESSION["sido"] = $sido;

    
?>



<select name="gugun" id="gugun" onchange="getDong(this.value);" style="width : 170px;" >
                <option value="">구군을 선택하세요. </option> 
                <?
                    $db -> where ("sido",$sido); 
                    $db -> groupBy("gugun");
                    $list = $db->get("dong"); 

                    foreach($list as $data){
                    ?>
                    <option value="<?=$data['gugun']?>"><?=$data['gugun']?></option> 
                    <? 
                    
                    };
                   

                ?>
            </select> 


 