<?php
include "db.php";
session_start();
if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
else $userid = "";   
if (isset($_SESSION["filtervalues"])) $filtervalues = $_SESSION["filtervalues"];
else $userid = "";   
  ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<style type="text/css">

		body { min-width: 100px; text-align:center;}
		#box h3 {padding-bottom:0px; margin-bottom:0px; margin-top:0px;}
		#box { text-align: center; width:300px; display:inline-block;}
		#box input { width:250px; height:30px; margin-bottom:10px; margin-top:3px;}
		.outline {border:solid 1px black;}
		#box span {float:left; text-indent: 1em;}

	</style>
	<script type="text/javascript">
		

		function id_finds(){
			
			<?php
                session_start();
                $_SESSION["filtervalues"] = $filtervalues;
                $_SESSION["userid"] = $userid;
            ?>  
			// if(!document.changecount.m_medicine.value){
			// 	alert("약국이름을 입력하세요.");
			// 	document.changecount.m_medicine.focus();
			// 	return;
			//}
			if (!document.changecount.m_name.value){
        		alert("약이름을 입력하세요");    
        		document.changecount.m_name.focus();
        		return;
    		}
			if(!document.changecount.m_count.value){
				alert("수량을 입력하세요.");
				document.changecount.m_count.focus();
				return;
			}
		document.changecount.submit();
		}

	</script>
</head>
<body>
	<div id = box>
		<hr class ="outline">
		<h3>수량 수정 </h3>
		<hr>
		<form name ="changecount" method="post" action="change.php">
		
			<span class="col1">ID : </span>
			<span class="col2"><?=$userid?></span><br><br>
			<span class="col1">약국이름 : </span>
			<span class="col2"><?=$filtervalues?></span><br><br>
				
		    <!-- <span>약국이름</span><br>
			<input ide="changecount" type="text" name="m_medicine"><br> -->
			<span>약 이름</span><br>
			<input id="changecount" type="text" name="m_name"><br>
			<span>수량</span><br>
			<input ide="changecount" type="text" name="m_count"><br>
			<hr class="outline">
		
			<a href="#"><img src="img/change_2.png" width="120px" height="120px" onclick="id_finds()"></a>
		</form>
	</div>
</body>
</html>
