<?php
    $id   = $_POST["id"];
    $pass = $_POST["pass"];

   $con = mysqli_connect("localhost", "yujin", "1294", "medicine");
   $sql = "select * from k_medicine where id='$id'";
   $result = mysqli_query($con, $sql);

   $num_match = mysqli_num_rows($result);

   if(!$num_match) 
   {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             history.go(-1)
           </script>
         ");
    }
    else
    {
        $row = mysqli_fetch_array($result);
        $db_pass = $row["pass"];

        mysqli_close($con);

        if($pass != $db_pass)
        {

           echo("
              <script>
                window.alert('비밀번호가 틀립니다!')
                history.go(-1)
              </script>
           ");
           exit;
        }
        else
        {
            session_start();
            $_SESSION["userid"] = $row["id"];

            if (isset($_SESSION["board_value"])) $board_value = $_SESSION["board_value"];
            else $board_value = "";    
           
          
            if ($board_value == 1){

              $_SESSION["board_value"] = 0;
              echo(" <script>
                    location.href = 'board_form.php';
                    </script> ");
            }
            else if ($board_value == 2){

              $_SESSION["board_value"] = 0;
              echo(" <script>
                    location.href = 'board_modify_form.php';
                    </script> ");
            }
            else if ($board_value == 3){

              $_SESSION["board_value"] = 0;
              echo(" <script>
                    location.href = 'board_delete.php';
                    </script> ");
            }
            else{
              echo(" <script>
                    location.href = 'manager_w2.php'; 
                    </script> ");
            }
        }
     }        
?>
