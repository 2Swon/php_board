<?php
  include "./db/db_con.php";
$id = $_POST['id'];
$pw = password_hash($_POST['pw'], PASSWORD_DEFAULT);
//입력받은 패스워드 해쉬값 암호화
$pw_check = $_POST['pw-check'];
$nickname = $_POST['nickname'];
$birth = $_POST['birth'];
$inval = "insert into member (MEMBER_ID, PWD, NICKNAME, BIRTH_DATE) values('$id', '$pw', '$nickname', '$birth')";
$info = mysqli_query($db, $inval);
if($_POST['id']=="" || $_POST['pw']==""){
  echo '<script> alert("아이디나 패스워드 입력하세요!"); history.back(); </script>';
}
else if($_POST['pw'] != $_POST['pw-check']){
  echo '<script> alert("비밀번호확인이 일치하지 않습니다."); history.back(); </script>';
}
else if($_POST['nickname']==""){
  echo '<script> alert("닉네임을 입력하세요!"); history.back(); </script>';
}
else if(!$info){
  die("회원가입 실패");
}
else{
  echo "
          <script>
              alert('회원가입이 완료 되었습니다.');
              location.href = 'login.php';
          </script>
      ";
}
mysqli_close($db);
?>