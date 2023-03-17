<?
    include "db.php"; 

    $gugun = $_GET['gugun'];
    session_start();
    if (isset($_SESSION["sido"])) $sido = $_SESSION["sido"];
    else $sido = "";   
    
    $_SESSION["gugun"] = $gugun;
    $_SESSION["sido"] = $sido;  
    
  
?>




<select name="dong" id="dong" onchange="all_s(this.value); " style="width : 170px;">
    <option value="">동을 선택하세요</option> 
    <?
        $db -> where ("gugun",$gugun); 
        $db -> groupBy("dong");
        $list = $db->get("dong"); 

        foreach($list as $data){
        ?>
            <option value="<?=$data['dong']?>"><?=$data['dong']?></option>             
        <?           
        };
    ?>
</select>
<!-- 
<script>
        // var value_str = document.getElementById('dongs');
        // var dong_sc = value_str.options[value_str.selectedIndex].value;
        // document.cookie = escape("dong") + "=" + escape(dong_sc);

        function changeFn(){
		    var city  = document.getElementById("dongs");
		    var valuee = (city.options[city.selectedIndex].value);
            document.cookie = "dong=valuee";
	    };
</script>
 -->




 