<?php
	include './config.php';
	include './db/db_con.php';
	
	$bno = $_POST['bno'];
	$sql = mq("insert
					board_review
			   set
					board_id = '".$bno."',
					board_review_writer = '".$_POST['dat_user']."',
					board_review_content = '".$_POST['content']."'
			");
			?>
			<script>
			alert("등록되었습니다.");
			location.href = 'read.php?BOARD_ID=<?=$bno?>';
		</script>