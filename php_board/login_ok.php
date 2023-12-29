<?php
include "./db/db_con.php";
    $id = $_POST['id'];
    $pw = $_POST['pw']; 
    
   $sql = "SELECT * 
   		   FROM MEMBER 
           WHERE MEMBER_ID='$id'
          ";
   $result = mysqli_query($db, $sql);

   $num_match = mysqli_num_rows($result);

   if($_POST['id']=="" || $_POST['pw']==""){
    echo("
    <script>
      window.alert('아이디와 비밀번호를 입력하세요!')
      history.back();
    </script>
  ");
   }
   else if(!$num_match) {
     echo("
           <script>
             window.alert('등록되지 않은 아이디입니다!')
             location.href = 'login.php';
           </script>
         ");
    }
    else {
        $row = mysqli_fetch_array($result);
        $db_pwd = $row['PWD'];
        
        mysqli_close($db);
		/* 로그인 화면에서 전송된 $pw와 DB의 $db_pass의 해쉬값 비교 */
        if(password_verify($pw, $db_pwd) == false){
        	echo("
	              <script>
	                window.alert('비밀번호가 틀립니다!')
	                location.href = 'login.php';
	              </script>
	           ");
	           exit;
        }
        else {
            session_start();
            $_SESSION["MEMBER_ID"] = $row["MEMBER_ID"];
            $_SESSION["NICKNAME"] = $row["NICKNAME"];
            $_SESSION["acts"] = $row["acts"];

            echo("
              <script>
                location.href = 'boards.php';
              </script>
            ");
        }
     }        
?>