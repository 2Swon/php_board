<?php
	include_once "./config.php";
	include "./db/db_con.php";
	include_once "./login_check.php";
	$bno = $_GET['BOARD_ID']; // $bno에 idx값을 받아와 넣음 
	/* 조회수 올리기  */
	$hit = mysqli_fetch_array(mq("select 
									* 
								  from 
									board 
								  where 
									BOARD_ID ='".$bno."'
								"));
	$hit = $hit['BOARD_VIEW'] + 1;
	mq("update 
		 board 
	   set 
		 BOARD_VIEW = '".$hit."' 
	   where 
		 BOARD_ID = '".$bno."'
	");
	
	/* 받아온 idx값을 선택해서 게시글 정보 가져오기 */
	$sql = mq("select 
				 * 
			   from 
				 board 
			   where 
				 BOARD_ID='".$bno."'
			"); 
	$board = $sql->fetch_array();
?>
<!DOCTYPE html>
<html>
	<head>
		<?php include_once "./fragments/head.php";?>
		
	</head>
	<body>
		<nav>
			<?php include_once "./fragments/header.php";?>
		</nav>
		<div class="container">
			<!-- 글 불러오기 -->
			<div id="board_read">
				<table class="table table-striped" style="text-align: center; border: 1px solid #ddddda">
					<thead>
						<tr>
							<th colspan="2" style="background-color: #eeeeee; text-align: center;"><h3><?=$board['BOARD_TITLE']?></h3></th>
						</tr>
					</thead>	
					<tbody>
						<tr>
							<td>작성자</td>
							<td colspan="2"><?=$board['BOARD_WRITER']?></td>
						</tr>
						<tr>
							<td>작성일자</td>
							<td colspan="2"><?=$board['BOARD_WRITER_DATE']?></td>
						</tr>
						<tr>
							<td>내용</td>
        			<td><div class="view-content" cols=75 rows=15><?=$board['BOARD_CONTENT']?></div></td>
						</tr>
						</tbody>
				</table>

				<!-- 목록, 수정, 삭제 -->
				<a href="boards.php" class="btn btn-primary">목록</a>
				<!-- 자신의 글만 수정, 삭제 할 수 있도록 설정-->
				<?php 
					if($MEMBER_ID==$board['BOARD_WRITER'] || $acts=="admin"){ // 본인 아이디거나, 관리자 계정이거나
				?>
						<a href="update.php?BOARD_ID=<?=$board['BOARD_ID']?>" class="btn btn-primary">수정</a>
						<a href="board_delete.php?BOARD_ID=<?=$board['BOARD_ID']?>" class="btn btn-primary">삭제</a>
				<?php } ?>
			</div>
		</div>
		<!-- 댓글 불러오기 -->
		<div class="container">
			<div class="reply_view">
				<h4 style="padding:10px 0 15px 0; border-bottom: solid 1px gray;">댓글목록</h4>
				<?php 
					$sql3=mq("select
						*
					  from
						BOARD_REVIEW
					  where
						BOARD_ID='".$bno."'
					  order by
						BOARD_REVIEW_ID desc
					");
					while($board_review=$sql3->fetch_array()){
				?>
				<form action="reply_delete.php" method="post">
				<div class="dat_view">
					<div><b><?=$board_review['BOARD_REVIEW_WRITER']?></b></div>
					<div class="dap_to comt_edit"><?php echo nl2br("$board_review[BOARD_REVIEW_CONTENT]"); ?></div>
					<div class="rep_me dap_to"><?=$board_review['BOARD_REVIEW_DATE']?></div>
					<div class="rep_me rep_menu">
						<input type="hidden" name="b_no" class="b_no" value=<?=$bno?>>
						<input type="hidden" name="rno" id="rno" class="rno" value=<?=$board_review['BOARD_REVIEW_ID']?>>
						<input type="submit" id="rep_btn" class="rep_btn" value="삭제" ></input>
						<hr>
					</div>
				</div>
					</form>			
				<?php } ?>
				<!-- 댓글 달기 -->
				<form action=reply.php method=post>
				<div class="dat_ins">
					<input type="hidden" name="bno" class="bno" value=<?=$bno?>>
					<input type="hidden" name="dat_user" id="dat_user" class="dat_user" value=<?=$MEMBER_ID?>>
					<div style="margin-top:10px;">
						<textarea name="content" class="rep_con" id="rep_con"></textarea>
						<button id="rep_btn" class="rep_btn">댓글</button>
					</div>
				</div>
				</form>
			</div>
		</div>
	</body>
</html>