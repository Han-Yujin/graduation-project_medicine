<!DOCTYPE html>
<style>
   #menu_bar { border:0px;border-color:white; margin:0px; padding:5px; height:40px; text-align:center; background-color: pink; width:100%; min-width:950px; background-color: pink; }
		#menu_bar a { color: black; font-size:14pt; margin:0px; padding:0px; }
		#menu_up {margin-bottom:0px;}
		#menu_bar ul { margin-top: 8px; z-index:20; }
		#search input:focus {outline:none;}
		#menu_down {margin-top:1px;}
		
		#menu_bar ul{padding:0px; }
    	#menu_bar ul > li { display:inline-block; width:180px; position:relative
    		; text-align: center; height:80px;}
   		#menu_bar ul > li ul{ display:none; position:absolute; top:26px; left:0; }
    	#menu_bar ul > li:hover ul{ display:block; background-color:rgba(203, 93, 93, 3); width:200px;}
    	#menu_bar ul > li ul > li { display:inline-block; width:200px; border:1px solid white; height:30px;}
    	#menu_bar  ul > li ul > li:hover { background:#b55353;}
        </style>
<html>
    <head>
        <meta charset="utf-8">
        <link rel="stylesheet" href="css/main.css">
        <title>medicine information</title>
        <!-- <button type="button" class="btm_image" id="img_btn"  onclick="location.href='index.php'">
        <img  src="img/title.png" width="300" height="90" ></button> -->
        <a href="index.php"><img src="./img/title.png" id="banner_img"></a>
        <style>
            </style>

    </head>
    <body> 
        <aTag_PageOpen>
        <hr id= "menu_up">
	<div id="menu_bar">
		<ul>
        <li> <a href="inventory.php" onclick="location.href=inventory.php">약재고 </a> </li>
        <li><a href="login_form.php" onclick="location.href=manager.html">관리자 </a> </li> 
        <li><a href="board_list.php" onclick="location.href=board_list.php">게시판 </a></li>  
			<li><a href="#">약 정보 바로가기</a>
				<ul>
					<li><a href="https://www.health.kr/main.asp">약학정보원</a></li>
					<li><a href="https://nedrug.mfds.go.kr/index">의약품 안전나라<br>[의약품통합정보시스템]</a></li>
					<li><a href="https://www.kpanet.or.kr/main.jsp">대한약사회</a></li>
				</ul>
			</li>
		</ul>
	</div>
	<hr id= "menu_down">
        </aTag_PageOpen>
        <br>
        <img src="./img/mainimg.jpg" height="470" width="1200"  >
        <style>
            img { display : block;  margin : auto;}
        </style>
    </body>
</html>