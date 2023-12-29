<?php
	include './config.php';
	include './db/db_con.php';
	
	// hidden의 값 rno를 받아와 그 값에 해당하는 idx 에 대한 reply 테이블 정보 가져오기
	$rno = $_POST['rno']; 
	$acts = $_SESSION['acts'];
	$sql = mq("select 
					* 
			   from 
					board_review 
			   where 
					board_review_id='".$rno."'
			");
	$reply = $sql->fetch_array();
	
	// hidden의 값 b_no를 받아와 그 값에 해당하는 idx 에 대한 board 정보 가져오기
	$bno = $_POST['b_no'];
	$sql2 = mq("select 
					* 
			    from 
					board 
			    where 
					board_id='".$bno."'
			");
	$board = $sql2->fetch_array();
	
	
	if($acts=="USER") {
		/* 비밀번호를 db의 해쉬값과 비교,  세션값과 db의 name을 비교  */
		if($MEMBER_ID == $reply['BOARD_REVIEW_WRITER'])
		{
			// 테이블 reply에서 인덱스값이 $rno인 값을 찾아 삭제
			$sql = mq("delete
					   from
							BOARD_REVIEW
					   where
							BOARD_REVIEW_ID='".$rno."'
					");
			?>
					<script>
						alert("댓글이 삭제 되었습니다.");
					</script>
					<meta http-equiv="refresh" content="0 url=/class1/boardProject/read.php?BOARD_ID=<?=$bno?>">
		
				<?php 
			}else{ ?>
					<script>
						alert('본인의 댓글이 아닙니다');
						history.back();
					</script>
		<?php } ?>
	<?php 
	}else if($acts=="admin"){
		$sql = mq("delete
					   from
							BOARD_REVIEW
					   where
							BOARD_REVIEW_ID='".$rno."'
					");
			?>
			<script>
						alert("댓글이 삭제 되었습니다.");
					</script>
					<meta http-equiv="refresh" content="0 url=/class1/boardProject/read.php?BOARD_ID=<?=$bno?>">
	<?php } ?>