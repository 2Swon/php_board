<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style1.css">
  <title>회원가입</title>

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
                  if(isset($_SESSION['acts'])==true) echo "<a href=# class='nav-item nav-link'>회원관리</a>";
                  echo "   
                        <a href='logout.php' class='nav-item nav-link'>Logout</a>
                  </div>
                  ";
               }
               ?>
            </div>
         </div>
      </nav>
  <div class="form-login">
    <form action="signup_ok.php" method="post">
      <label for="id">아이디</label>
      <input type="text" name="id" id="id" class="input-text" placeholder="아이디">
      <label for="pw">비밀번호</label>
      <input type="password" id="pw" name="pw" class="input-text" placeholder="비밀번호">
      <label for="pw">비밀번호확인</label>
      <input type="password" id="pw-check" name="pw-check" class="input-text" placeholder="비밀번호 확인">
      <label for="nickname">닉네임</label>
      <input type="text" name="nickname" id="nickname" class="input-text">
      <label for="birth">생년월일</label>
      <input type="date" name="birth" id="birth" class="input-text">
      <input type="submit" value="회원가입" class="submit-btn">
    </form>
  </div>

</body>
</html>