<?php
   include_once "./config.php";
   include_once "./db/db_con.php";
   unset($_SESSION['MEMBER_ID']);
   unset($_SESSION['PWD']);
   unset($_SESSION['acts']);
?>
<!DOCTYPE html>
<html lang="ko">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/bootstrap.css">
  <link rel="stylesheet" href="css/style1.css">
  <title>로그인</title>
  <?php include_once "./fragments/head.php";?>
</head>
<body>
   <nav>
<?php include_once "./fragments/header.php";?>
</nav>
  <div class="form-login">
    <form action="login_ok.php" method="post">
      <input type="text" name="id" class="input-text" placeholder="아이디" >
      <input type="password" name="pw" class="input-text" placeholder="비밀번호">
      <input type="submit" value="로그인" class="submit-btn">
    </form>
    <div class="links">
      <a href="./signup.php">회원가입</a>
    </div>
  </div>

</body>
</html>