<?php
	include "./db/db_con.php";
	$bno = $_GET['BOARD_ID'];
	/* 받아온 idx값을 선택해서 게시글 삭제 */
	mq("delete 
		   from 
				BOARD 
		   where 
				BOARD_ID='$bno'
		");
?>
	<script>
		alert("삭제되었습니다.");
	</script>
	<meta http-equiv="refresh" content="0 url=/class1/boardProject/boards.php">
