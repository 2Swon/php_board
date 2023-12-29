<?php
	include "./config.php";
	include "./db/db_con.php";

	$bno = $_POST['BOARD_ID']; // $bno(hidden)에 idx값을 받아와 넣음
	$date = date('Y-m-d'); 
	$title = $_POST['title'];
	$content = $_POST['content'];
	/* 받아온 idx값을 선택해서 게시글 수정 */
	mq("update 
			board 
	   set 
			BOARD_WRITER_DATE = '".$date."', 
			BOARD_TITLE='".$title."',
			BOARD_CONTENT='".$content."' 
	   where 
			BOARD_ID='".$bno."'
	");
?>
	<script>
		alert("수정되었습니다.");
		location.href = 'read.php?BOARD_ID=<?=$bno?>';
	</script>


