<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="css/bootstrap.css">
</head>
<body>
<nav class="navbar sticky-top navbar-expand-lg navbar-dark bg-dark">
         <div class="container-fluid">
            <div class="collapse navbar-collapse justify-content-between">
               <div class="navbar-nav">
                  <!--왼쪽부분-->
                  <a href="boards.php" class="nav-item nav-link">게시판</a> 
               </div>
               <?php
               if (isset($_SESSION) === false){session_start();}

               if (isset($_SESSION['MEMBER_ID']) === false){
               ?>
                <div class='navbar-nav'>
               <a href='signup.php' class="nav-item nav-link">회원가입</a>
               <a href='login.php' class="nav-item nav-link">로그인</a>
               </div>

               <?php
               }else{
               ?>
               <?php
               
                  echo "
                  <div class='navbar-nav'>
                      <a href='form_member.php?id=".$_SESSION['MEMBER_ID']."' class='nav-item nav-link'>".$_SESSION['NICKNAME']."(".$_SESSION['MEMBER_ID'].")</a>
                  ";
                  if($_SESSION['acts']== 'admin') echo "<a href=admin.php class='nav-item nav-link'>회원관리</a>";
                  echo "   
                        <a href='logout.php' class='nav-item nav-link'>Logout</a>
                  </div>
                  ";
               }
               ?>
            </div>
         </div>
      </nav>
   </body>
</html>