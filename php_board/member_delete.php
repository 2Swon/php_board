<?php
	include "./db/db_con.php";
	$mid = $_GET['MEMBER_ID'];
	mq("delete 
		   from 
				MEMBER 
		   where 
				MEMBER_ID='$mid'
		");
?>
	<script>
		alert("해당 회원이 탈퇴되었습니다.");
	</script>
	<meta http-equiv="refresh" content="0 url=/class1/boardProject/admin.php">