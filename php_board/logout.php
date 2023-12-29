<?php
	include "./db/db_con.php";
	session_start();
	unset($_SESSION['MEMBER_ID']);
	unset($_SESSION['PWD']);
	unset($_SESSION['acts']);
?>
<meta charset="utf-8">
<script>alert("로그아웃되었습니다."); location.href="login.php"; </script>