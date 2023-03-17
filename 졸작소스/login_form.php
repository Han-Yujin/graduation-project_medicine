<!DOCTYPE html>
<html>
<style>
#login_box {width: 429px; margin: 0 auto; text-align: center; border:1px solid black; padding: 80px 5px 110px 5px; background-color:white; margin-top:%; }
#login_btn {margin-top : 15px; margin-bottom:50px; width:100px; height:53px; }
#login_img {width: 350px; height: 53px;}
#login_box span {font-size :20px; font-weight:bold; margin-left: -279px;}
#login_box input {width : 80%; height:45px; border-right:0px; border-left:0px; border-top:0px; margin-top:5px; outline:none;}
#login_box hr {width : 80%;}
#plus {text-align:right; width :91%;}
#login_box a {text-decoration:none; color:#7E7E7E;}
</style>
<script type="text/javascript" src="./js/login.js">
</script>
<?php
include "main.php"
?>
<head> 
</head>
<body id ="bodys">
<div><br>
    <div id="login_box">
	    <div id="login_title">
		    <span>로그인</span>
	    </div>
	    <div id="login_form">
			<form  name="login_form" method="post" action="login.php">		       	
				
				<ui><input type="text" name="id" placeholder="아이디" style="width:420px;"></ui><br><br>
				<ui><input type="password" id="pass" name="pass" placeholder="비밀번호" style="width:420px;"></ui> <!-- pass -->
				<br>
				<div id="login_btn">
					<a href="#"><img src="./img/loginimg.png" onclick="check_input()" style="width:430px;,height:300px;"></a>
				</div>		    	
			</form>
        </div> 
    </div> 
</div> 
</body>

<footer>
    <?php include "footer.php";?>
 </footer>
</html>

