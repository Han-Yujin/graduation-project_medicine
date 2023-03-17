

<!DOCTYPE html>
<html>
<head> 
<meta charset="utf-8">
<?php
        session_start();
        if (isset($_SESSION["num"])) $num = $_SESSION["num"];
        else $num = "";    
		if (isset($_SESSION["page"])) $page = $_SESSION["page"];
        else $page = "";   
		if (isset($_SESSION["userid"])) $userid = $_SESSION["userid"];
        else $userid = "";   
    ?> 
<title>게시글 수정</title>
<link rel="stylesheet" type="text/css" href="./css/common.css">
<link rel="stylesheet" type="text/css" href="./css/board.css">
<?php

   session_start();
   $_SESSION["board_modifity"] = 0;
  
?>
<!-- <style>
		    body{min-width:950px; text-align:center;}
</style> -->
<script>
  function check_input() {
      if (!document.board_form.subject.value)
      {
          alert("제목을 입력하세요!");
          document.board_form.subject.focus();
          return;
      }
      if (!document.board_form.content.value)
      {
          alert("내용을 입력하세요!");    
          document.board_form.content.focus();
          return;
      }
      document.board_form.submit();
   }
</script>
</head>
<body> 
<header>
    <?php include "main.php";?>
</header>  
<section>
	
   	<div id="board_box">
	    <h3 id="board_title">
	    		게시판 > 글 쓰기
		</h3>
<?php
	
	
	$con = mysqli_connect("localhost", "yujin", "1294", "medicine");
	$sql = "SELECT * from board where num=$num";
	$result = mysqli_query($con, $sql);
	$row = mysqli_fetch_array($result);
	$name       = $row["name"];
	$subject    = $row["subject"];
	$content    = $row["content"];		
	$file_name  = $row["file_name"];

?>
     
	 
	    <form  name="board_form" method="post" action="board_modify.php" enctype="multipart/form-data">
	    	 <ul id="board_form">
				<li>
					<span class="col1">이름 : </span>
					<span class="col2"><?=$userid?></span>
				</li>		
	    		<li>
	    			<span class="col1">제목 : </span>
	    			<span class="col2"><input name="subject" type="text" value="<?=$subject?>"></span>
	    		</li>	    	
	    		<li id="text_area">	
	    			<span class="col1">내용 : </span>
	    			<span class="col2">
	    				<textarea name="content"style=margin-left:65; ><?=$content?></textarea>
	    			</span>
	    		</li>
	    		<li>
			        <span class="col1"> 첨부 파일 : </span>
			        <span class="col2"><?=$file_name?></span>
			    </li>
	    	    </ul>
	    	<ul class="buttons">
				<li><button type="button" onclick="check_input()">수정하기</button></li>
				<li><button type="button" onclick="location.href='board_list.php'">목록</button></li>
			</ul>
	    </form>
	</div> <!-- board_box -->
</section> 

</body>
</html>
